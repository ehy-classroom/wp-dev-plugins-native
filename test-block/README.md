# Test Block Plugin für WordPress

Dieses Plugin demonstriert, wie ein einfacher eigener Gutenberg-Block für WordPress erstellt werden kann.  
Dabei wird bewusst auf Build-Tools und moderne Strukturen wie block.json verzichtet, um den Prozess verständlich und überschaubar zu halten.

## Ziel dieses Plugins

- Ein eigener Block mit Texteingabe über die rechte Seitenleiste (Inspector Controls)
- Getrennte Stylesheets für Editor und Frontend
- Eigene, einfache CSS-Klasse für den Block (ehy-simple-msg)
- Übersichtliche und nachvollziehbare Struktur

## Grundkonzepte

- Gutenberg-Block: Ein JavaScript-Objekt, das sich selbst beschreibt und registriert wird.
- registerBlockType: Die zentrale Funktion zur Registrierung eines Blocks im Editor.
- attributes: Die Datenstruktur des Blocks (hier ein einfacher String für den Textinhalt).
- edit-Funktion: Bestimmt die Darstellung und das Verhalten des Blocks im Gutenberg-Editor.
- save-Funktion: Bestimmt, wie der Block-Inhalt im Frontend gespeichert und angezeigt wird.
- useBlockProps: Sorgt dafür, dass der Block die nötigen HTML-Attribute erhält.
- InspectorControls: Baut die Eingabefelder in der rechten Seitenleiste des Editors.

## Vorgehensweise beim Aufbau

1. JavaScript-Datei (block.js):
   - Registriert den Block
   - Definiert, wie der Block im Editor erscheint (edit) und im Frontend gespeichert wird (save)
   - Weist dem Block eine eigene CSS-Klasse zu

2. PHP-Datei (test-block.php):
   - Lädt das JavaScript und die Stylesheets
   - Trennt Editor-spezifische und Frontend-spezifische Ressourcen
   - Verwendet filemtime() für die automatische Versionierung der Dateien, um Caching-Probleme zu vermeiden

## Dateien im Überblick

### block.js

- Importiert WordPress-Module für Blöcke und UI-Komponenten
- Registriert eine eigene Block-Kategorie (ehy-blocks)
- Definiert ein Attribut content für den eingegebenen Text
- Erstellt ein Eingabefeld in der rechten Seitenleiste (Inspector Controls)
- Gibt ein p-Element mit der Klasse ehy-simple-msg sowohl im Editor als auch im Frontend aus

### test-block.php

- Lädt das block.js-Skript und das editor-style.css-Stylesheet für den Editor (Backend)
- Lädt das style.css-Stylesheet für die Website (Frontend)
- Verwendet Hooks, um die Ressourcen korrekt zu registrieren
- Nutzt filemtime(), damit Browser immer aktuelle Versionen laden

## Didaktische Anmerkungen

- wp_enqueue_script(): Lädt eine JavaScript-Datei in WordPress.
- wp_enqueue_style(): Lädt ein Stylesheet in WordPress.
- plugin_dir_url(__FILE__): Gibt die URL zum aktuellen Plugin-Verzeichnis zurück.
- filemtime(): Nutzt das letzte Änderungsdatum einer Datei für Cache-Busting.
- enqueue_block_editor_assets: Lädt Ressourcen ausschließlich im Gutenberg-Editor.
- wp_enqueue_scripts: Lädt Ressourcen im Frontend der Website.
- useBlockProps(): Fügt dem Block Standardattribute wie className hinzu.
- InspectorControls: Baut Eingabefelder für Blöcke in der rechten Seitenleiste auf.
- attributes: Speichern Benutzereingaben strukturiert innerhalb des Blocks.
- edit und save: Trennen die Darstellung im Editor von der Ausgabe im Frontend.

## Zusammenfassung für den Kurs

Dieses Plugin zeigt, wie Gutenberg-Blöcke mit überschaubarem JavaScript und PHP erstellt werden können,  
ohne zusätzliche Build-Tools oder moderne Strukturen wie block.json zu benötigen.

Der Code ist so strukturiert, dass Teilnehmer mit JavaScript-Grundkenntnissen nachvollziehen können:

- Wie ein eigener Block registriert wird
- Wie Editor- und Frontend-Darstellung getrennt werden
- Wie Gutenberg mit klassischen WordPress-Methoden zusammenspielt
