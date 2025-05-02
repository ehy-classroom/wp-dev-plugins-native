const { registerBlockType } = wp.blocks;
const { useEffect } = wp.element;
const { useBlockProps } = wp.blockEditor;
const { PanelBody, SelectControl } = wp.components;
const { InspectorControls } = wp.blockEditor;
const { __ } = wp.i18n;

registerBlockType('qab/navigation-block', {
    title: __('QAB Navigation (Native)', 'qab-blocks'),
    icon: 'menu',
    category: 'widgets',
    attributes: {
        menuLocation: {
            type: 'string',
            default: 'qab-primary'
        },
        htmlContent: {
            type: 'string',
            default: ''
        },
        navClass: { // Neues Attribut für benutzerdefinierte Klassen
            type: 'string',
            default: ''
        }
    },

    edit({ attributes, setAttributes }) {
        const { menuLocation, htmlContent, navClass } = attributes;
        const blockProps = useBlockProps({
            className: '' // Versuch die Standardklasse vollständig zu entfernen.
        });

        useEffect(() => {
            fetch(`/wp-json/qab-native/v1/menu/${menuLocation}`)
                .then((res) => res.json())
                .then((data) => {
                    setAttributes({ htmlContent: data.html });
                });
        }, [menuLocation]);

        return [
            wp.element.createElement(
                InspectorControls,
                {},
                wp.element.createElement(
                    PanelBody,
                    { title: __('Navigation Settings', 'qab-blocks') },
                    wp.element.createElement(SelectControl, {
                        label: __('Menu Location', 'qab-blocks'),
                        value: menuLocation,
                        // Kennzeichnung der Menüoptionen, die parallel in qab-navigation.php registriert werden müssen
                        options: [
                            { label: 'QAB Primary', value: 'qab-primary' }, // Parallel in qab-navigation.php registriert
                            { label: 'QAB Footer', value: 'qab-footer' },  // Parallel in qab-navigation.php registriert
                            // { label: 'QAB Secondary', value: 'qab-secondary' }, // Beispiel für ein neues Menü
                            // { label: 'QAB Language', value: 'qab-language' }    // Beispiel für ein neues Menü
                        ],
                        onChange: (value) => setAttributes({ menuLocation: value })
                    }),
                    wp.element.createElement('input', {
                        type: 'text',
                        value: navClass,
                        placeholder: __('Enter custom classes', 'qab-blocks'),
                        onChange: (event) => setAttributes({ navClass: event.target.value })
                    })
                )
            ),
            wp.element.createElement(
                'nav',
                {
                    ...blockProps,
                    className: `qab-navigation ${navClass || ''}`.trim(), // 'qab-navigation' als Standardklasse
                    dangerouslySetInnerHTML: { __html: htmlContent }
                }
            )
        ];
    },

    // Erklärung zu dangerouslySetInnerHTML:
    // Dieses Schlüsselwort wird verwendet, um HTML-Inhalte direkt in ein React-Element einzufügen.
    // Es wird "dangerously" genannt, weil es potenziell gefährlich ist, wenn der eingefügte HTML-Inhalt
    // nicht vertrauenswürdig ist. Dies kann zu Cross-Site Scripting (XSS)-Angriffen führen, wenn
    // bösartiger Code in den HTML-Inhalt eingeschleust wird. Daher sollte es nur verwendet werden,
    // wenn der HTML-Inhalt aus einer vertrauenswürdigen Quelle stammt oder zuvor sicher bereinigt wurde.
    // In diesem Fall wird es verwendet, um das HTML eines Menüs, das über die REST-API geladen wurde,
    // direkt in das <nav>-Element einzufügen.

    save({ attributes }) {
        const { navClass, htmlContent } = attributes;
        const blockProps = useBlockProps.save({
            className: '' // Versuch die Standardklasse vollständig zu entfernen. 
        });
        return wp.element.createElement(
            'nav',
            {
                ...blockProps,
                className: `qab-navigation ${navClass || ''}`.trim(), // 'qab-navigation' als Standardklasse
                dangerouslySetInnerHTML: { __html: htmlContent }
            }
        );
    }
});
