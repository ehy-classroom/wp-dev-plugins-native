// Wir importieren notwendige Funktionen und Komponenten aus dem globalen WordPress-Editor-Umfeld.
// Diese werden beim Arbeiten mit Gutenberg-Blöcken benötigt.
const { registerBlockType, setCategories, getCategories } = wp.blocks;
const { InspectorControls, useBlockProps } = wp.blockEditor;
const { PanelBody, TextControl } = wp.components;

// Gutenberg-Blöcke können Kategorien zugeordnet werden.
// Hier fügen wir eine eigene Block-Kategorie hinzu, damit unser Block sauber einsortiert wird.
setCategories([
    ...getCategories(), // Bestehende Kategorien beibehalten
    {
        slug: 'ehy-blocks', // Maschinenlesbarer Name
        title: 'Ehy Blocks', // Anzeigename im Editor
    }
]);

// Hier registrieren wir unseren neuen Block im Gutenberg-Editor.
// 'ehy-blocks/simple-msg' ist der eindeutige Blockname im Format 'namespace/blockname'.
registerBlockType('ehy-blocks/simple-msg', {
    title: 'Simple MSG', // Name des Blocks, sichtbar im Editor
    icon: 'admin-comments', // Icon für den Block im Editor (WordPress Dashicons)
    category: 'ehy-blocks', // Die Kategorie, unter der der Block angezeigt wird
    attributes: {
        // Definition der Datenstruktur des Blocks:
        // 'content' speichert den eingegebenen Text als String.
        content: {
            type: 'string',
            default: 'Standardtext',
        },
    },

    // Die edit-Funktion beschreibt, wie der Block im Editor aussieht und funktioniert.
    // Diese Funktion wird aufgerufen, wenn der Benutzer den Block bearbeitet.
    edit: ({ attributes, setAttributes }) => {
        // useBlockProps gibt die Standard-HTML-Attribute für Blöcke zurück.
        // Hier überschreiben wir die Standardklasse und setzen eine eigene Klasse.
        const blockProps = useBlockProps({
            className: 'ehy-simple-msg'
        });

        return [
            // InspectorControls erlaubt es, Einstellungen für den Block in der rechten Seitenleiste einzubauen.
            wp.element.createElement(
                InspectorControls,
                {},
                wp.element.createElement(
                    PanelBody,
                    { title: 'Block Einstellungen' },
                    wp.element.createElement(TextControl, {
                        label: 'Text', // Beschriftung des Eingabefelds
                        value: attributes.content, // aktueller Wert
                        onChange: (value) => setAttributes({ content: value }), // Aktualisiert den Wert bei Eingabe
                    })
                )
            ),
            // Die tatsächliche visuelle Darstellung des Blocks im Editor.
            // Wir verwenden ein <p>-Element, in dem der eingegebene Text angezeigt wird.
            wp.element.createElement(
                'p',
                blockProps, // Übergibt unsere benutzerdefinierte Klasse und andere Standardattribute
                attributes.content
            )
        ];
    },

    // Die save-Funktion beschreibt, wie der Block-Inhalt dauerhaft auf der Website gespeichert wird.
    // Der hier zurückgegebene Code wird beim Rendern im Frontend verwendet.
    save: ({ attributes }) => {
        const blockProps = useBlockProps.save({
            className: 'ehy-simple-msg'
        });

        return wp.element.createElement(
            'p',
            blockProps,
            attributes.content
        );
    }
});
