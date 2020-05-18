# Mathbase
## Technologie
selbst machen oder Angular?

## Muss
* User können Aufgaben hochladen (Text), Antwort wird mit angegeben (als Zahl)
* User können Aufgaben beantworten
* Userverwaltung
* (eigene) Aufgabenverwaltung (eigene Aufgaben löschen, editieren)
* Kategorien (nur Admins, oder nur per Dropdown)
    * Schwierigkeitsgrad als Schulklassenstufe (1., 2., Studium)

## Optional
* Textsuche
* Auswertungen/Statistiken
* Komplexere Antworten zulassen
* Aufgaben in Dateiform hochladen
* Funktionen zeichnen lassen (anzeigen)
* Highscore-System
* Turniere
* Dark-Mode

## Farben
![Farben](/assets/colors.png)

## Design
[Liegt auf Figma](https://www.figma.com/file/nf1VZQWZQop2JShdxD4DIq/mathbase)

## Datenbank
Bitte bei jeder Änderung, die lokal an der Datenbank gemacht wird (hinzufügen, ändern oder löschen von Tabellen), einen Export hinzufügen, damit immer alle den aktuellen Stand haben. Der Export kann gerne den bisher vorhandenen überschreiben.

## Login Library
Wir nutzen die Library [PHP-Auth](https://github.com/delight-im/PHP-Auth) für unsere Userverwaltung.