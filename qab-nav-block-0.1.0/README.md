# QAB Navigation Block Plugin

Das QAB Navigation Block Plugin ist ein WordPress-Plugin, das einen nativen Gutenberg-Block für Navigationsmenüs bereitstellt. Es kombiniert PHP, JavaScript und React, um eine nahtlose Integration zwischen Backend und Frontend zu ermöglichen.

## Zusammenspiel von PHP, JavaScript und React

1. **PHP**:
   - PHP wird verwendet, um die REST-API-Endpunkte zu registrieren, die die Navigationsmenüs dynamisch bereitstellen.
   - Es registriert außerdem die Menüpositionen im Theme und stellt sicher, dass die Menüs korrekt im Frontend gerendert werden.

2. **JavaScript**:
   - Das JavaScript steuert die Benutzeroberfläche des Blocks im Gutenberg-Editor.
   - Es verwendet React, um dynamisch Inhalte zu laden und darzustellen, indem es die von der REST-API bereitgestellten Daten verarbeitet.

3. **React**:
   - React wird verwendet, um die interaktive Benutzeroberfläche des Blocks zu erstellen.
   - Es ermöglicht die dynamische Aktualisierung der Vorschau im Editor basierend auf den Benutzereinstellungen (z. B. Auswahl der Menüposition oder benutzerdefinierte Klassen).

## Native JavaScript-Implementierung

Im Gegensatz zu den meisten modernen WordPress-Plugins, die ein Build-Environment mit JSX und npm verwenden, wurde das JavaScript in diesem Plugin nativ geschrieben. Das bedeutet:
- Es wird kein Transpiler wie Babel benötigt.
- Es wird kein Modul-Bundler wie Webpack verwendet.
- Der Code ist direkt im Browser ausführbar, ohne dass ein Build-Prozess erforderlich ist.

Diese Herangehensweise macht das Plugin besonders leichtgewichtig und einfach zu warten, da keine zusätzlichen Abhängigkeiten oder Build-Schritte erforderlich sind.

## Anmerkung: Was ist ein Build-Environment mit npm?

Ein Build-Environment mit npm (Node Package Manager) wird häufig verwendet, um moderne JavaScript-Anwendungen zu entwickeln. Es umfasst:
- **JSX**: Eine Syntaxerweiterung für JavaScript, die das Schreiben von React-Komponenten erleichtert.
- **Transpiler**: Tools wie Babel, die modernen JavaScript-Code (z. B. JSX) in älteres JavaScript umwandeln, das von allen Browsern unterstützt wird.
- **Modul-Bundler**: Tools wie Webpack, die mehrere JavaScript-Dateien und Abhängigkeiten in eine einzige Datei bündeln.

Ein solches Build-Environment ermöglicht es Entwicklern, moderne Features und Syntax zu nutzen, erfordert jedoch zusätzliche Schritte, um den Code für die Produktion bereitzustellen.