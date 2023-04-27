# IT-Dokumentation

## Voraussetzung 
Es wird ein LAMP-Stack und Grundkenntnisse in Webserver, php und mysql  vorausgesetzt. 

## Installation
### Git-Repo Clonen
Das Repository in den Webserver clonen

    https://github.com/PhilippKuhlmann/dokumentation.git

### Composer

    composer install

### NPM

    npm install

### Konfigurationsdatei anpassen
Hier die Datei anpassen und mit eurer Datenbank ausfüllen.

    cp .env.example .env
    nano .env

### App Key erstellen

    php artisan key:generate

### Datenbank migrieren

    php artisan migrate:fresh --seed
