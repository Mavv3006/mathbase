# Getting Started

## XAMPP installieren
Um dieses Projekt zu testen wird empfohlen [XAMPP](https://www.apachefriends.org/de/index.html) zu installieren.

## PHP installieren
Bei XAMPP ist auch eine PHP Version enthalten. Damit dieses Projekt aber richtig läuft, ist es nötig mindestens die PHP Version `7.4` installiert zu haben. Um die installierte Version zu überprüfen, einfach im Terminal den Befehl `php --version` ausführen.

Sollte eine ältere Version installiert sein, kann [hier](https://www.php.net/downloads.php) die aktuellste heruntergeladen und installiert werden.

Erscheint eine Fehlermeldung mit dem Hinweis, dass `php` nicht gefunden wurde, kann es sein, dass die Umgebungsvariable nicht gesetzt ist. Dies muss dann noch manuell nachgeholt werden. Eine Anleitung findet man [hier](https://www.java.com/de/download/help/path.xml). Wurde XAMPP standardmäßig installiert, lautet die einzufügende Umgebungsvariable `C:\xampp\php`. Abschließend sollte ein Neustart erfolgen.

## FileZilla Client installieren
Um Dateien per FTP hochzuladen kann FileZilla verwendet werden. Das Programm kann [hier](https://filezilla-project.org/) runtergeladen werden.
Zum Anmelden Server, Benutzername und Passwort eingeben und auf `Verbinden` klicken. Alle Dateien im Ordner `www` sind online.

## Entwicklungsumgebung einrichten
Um an diesem Projekt mitzuarbeiten, wird empfohlen entweder Visual Studio Code (VS Code) oder JetBrains PhpStorm zu verwenden.

### VS Code
VS Code ist ein Editor, der stark auf Erweiterungen aus der Community aufbaut. Daher folgen hier nun ein paar wichtige Erweiterungen, damit man in VS Code leicht PHP programmieren kann.

#### Empfohlene Erweiterungen
- [PHP Debug](https://marketplace.visualstudio.com/items?itemName=felixfbecker.php-debug) (Nur für's Debuggen notwendig)
- [PHP DocBlocker](https://marketplace.visualstudio.com/items?itemName=neilbrayfield.php-docblocker)
- [PHP Intelephense](https://marketplace.visualstudio.com/items?itemName=bmewburn.vscode-intelephense-client)
- [PHP IntelliSense](https://marketplace.visualstudio.com/items?itemName=felixfbecker.php-intellisense)

#### Executable Path setzen
Damit VS Code die richtige PHP Version benutzt, muss auch hier die "Path" Variable gesetzt werden. Dies wird automatisch bei der Installation von XAMPP durchgeführt. Wenn PHP manuell nachinstalliert wurde, müssen folgende Schritte durchgeführt werden.

Hierfür einfach in den Einstellungen von VS Code nach "php" suchen. Unter `PHP > Validate: Executable Path` muss in der `settings.json` der Key `php.validate.executablePath` auf den Pfad von PHP gesetzt werden.

### PhpStorm

#### PHP Version
Auch in PhpStorm muss die PHP Version auf `7.4` gesetzt werden. Hierfür wird beim Öffnen des Projekes in PhpStorm automatisch ein `.idea` Ordner angelegt. In diesem ist eine `php.xml` enthalten. Sie muss so aussehen:

```xml
<?xml version="1.0" encoding="UTF-8"?>
<project version="4">
  <component name="PhpProjectSharedConfiguration" php_language_level="7.4" />
</project>
```