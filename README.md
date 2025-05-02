# WP Plugin Development

Eine kleine Sammlung von WordPress PlugIns, die als Code-Beispiele für die Grundeinführung in das Entwickeln von WP PlugIns und WP Blöcken dienen.

## Enthaltene PlugIns

1. **Test Block Plugin**: Demonstriert die Erstellung eines einfachen Gutenberg-Blocks ohne Build-Tools. Es zeigt, wie man JavaScript und PHP kombiniert, um einen Block mit Texteingabe und separaten Stylesheets für Editor und Frontend zu erstellen.
2. **QAB Navigation Block**: Ein nativer Gutenberg-Block für Navigationsmenüs, der ohne Build-Tools auskommt. Es verwendet PHP, JavaScript und React für eine nahtlose Integration zwischen Backend und Frontend.
3. **EHy Portfolio**: Registriert einen Custom Post Type namens "Portfolio" und zeigt, wie man benutzerdefinierte Inhalte in WordPress verwaltet.
4. **My Basic Plugin**: Ein einfaches Beispiel-Plugin, das eine Admin-Benachrichtigung anzeigt.

## Grundlagen von WordPress Plugin Development

WordPress Plugin Development ist ein zentraler Bestandteil der Erweiterbarkeit von WordPress. Plugins ermöglichen es Entwicklern, die Funktionalität von WordPress zu erweitern, ohne den Kerncode zu verändern. Dies geschieht durch die Nutzung von Hooks (Actions und Filters), die es erlauben, an bestimmten Punkten in den WordPress-Prozessen eigene Funktionen auszuführen oder bestehende Daten zu modifizieren. Plugins können von einfachen Funktionen, wie dem Hinzufügen einer Admin-Benachrichtigung, bis hin zu komplexen Anwendungen reichen, die neue Benutzeroberflächen oder Backend-Funktionen bereitstellen.

Ein wichtiger Aspekt bei der Plugin-Entwicklung ist die Sicherheit. Entwickler sollten sicherstellen, dass ihre Plugins vor unbefugtem Zugriff geschützt sind, indem sie beispielsweise den direkten Zugriff auf Dateien mit `defined('ABSPATH')` verhindern. Darüber hinaus ist es wichtig, JavaScript- und CSS-Dateien korrekt mit `wp_enqueue_script()` und `wp_enqueue_style()` einzubinden, um Konflikte mit anderen Plugins oder Themes zu vermeiden.

### Relevantes Beispiel-Plugin
- **My Basic Plugin**: Dieses Plugin zeigt die Grundlagen der Plugin-Entwicklung, indem es eine einfache Admin-Benachrichtigung hinzufügt. Es ist ein hervorragendes Beispiel für den Einstieg in die Plugin-Entwicklung.

---

## Grundlagen von WordPress Block Development (nativ)

Die Entwicklung von Gutenberg-Blöcken ist ein wesentlicher Bestandteil der modernen WordPress-Entwicklung. Blöcke ermöglichen es, Inhalte auf intuitive Weise zu erstellen und zu gestalten. Native Block-Entwicklung bedeutet, dass keine zusätzlichen Build-Tools wie Webpack oder Babel verwendet werden. Stattdessen wird direkt mit JavaScript und den WordPress-APIs gearbeitet.

Ein Block wird mit der Funktion `registerBlockType` registriert, die die Struktur und Funktionalität des Blocks definiert. Die `edit`-Funktion bestimmt, wie der Block im Editor dargestellt wird, während die `save`-Funktion die Ausgabe im Frontend definiert. Mit `InspectorControls` können benutzerdefinierte Einstellungen für den Block im Editor hinzugefügt werden, und `useBlockProps` sorgt dafür, dass der Block die notwendigen HTML-Attribute erhält.

Die native Entwicklung ist besonders für Einsteiger geeignet, da sie den Entwicklungsprozess vereinfacht und keine zusätzlichen Abhängigkeiten erfordert.

### Relevante Beispiel-Plugins
- **Test Block Plugin**: Demonstriert die Erstellung eines einfachen Blocks mit Texteingabe und separaten Stylesheets für Editor und Frontend.
- **QAB Navigation Block**: Zeigt, wie ein nativer Block für Navigationsmenüs entwickelt wird, der PHP, JavaScript und React kombiniert.

---

## Grundlagen von Custom Post Types

Custom Post Types (CPTs) sind eine leistungsstarke Funktion von WordPress, die es ermöglicht, benutzerdefinierte Inhaltstypen zu erstellen. Sie erweitern die Standard-Inhaltstypen wie Beiträge und Seiten und sind ideal für spezifische Inhalte wie Portfolios, Events oder Produkte.

Die Registrierung eines CPT erfolgt mit der Funktion `register_post_type`, die Parameter wie Labels, Unterstützung für bestimmte Funktionen (z. B. Titel, Editor, Thumbnails) und Sichtbarkeit im Frontend definiert. CPTs können auch mit benutzerdefinierten Taxonomien kombiniert werden, um Inhalte besser zu organisieren.

Ein gut gestalteter CPT verbessert die Benutzererfahrung und ermöglicht es, Inhalte effizient zu verwalten und darzustellen. Die Verwendung von REST-API-Unterstützung (`show_in_rest`) macht CPTs auch für moderne Anwendungen und Gutenberg-Blöcke zugänglich.

### Relevantes Beispiel-Plugin
- **EHy Portfolio**: Dieses Plugin registriert einen Custom Post Type namens "Portfolio" und zeigt, wie benutzerdefinierte Inhalte in WordPress verwaltet werden können.

---

Autor: Enno Hyttrek  
https://ennohyttrek.de

Version: 1.0.0