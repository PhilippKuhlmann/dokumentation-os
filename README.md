# IT-Dokumentation

![Tests](https://github.com/PhilippKuhlmann/it-dokumentation/actions/workflows/tests.yml/badge.svg)

Ein Open-Source-System zur **IT-Dokumentation und Asset-Verwaltung** für Managed Service Provider
(MSPs), gebaut mit Laravel 10 und Livewire.

Die Anwendung verwaltet die komplette IT-Infrastruktur je Kunde – von Standorten über Server und
Netzwerk bis zu Lizenzen und Zugangsdaten – und erzeugt daraus PDF-Dokumentationen.

## Features

- **Kunden & Standorte** – Mehrmandantenfähige Struktur je Kunde
- **Infrastruktur** – Server, VMs, NAS, Computer, Racks
- **Netzwerk** – Router, Switches, Access Points, WLAN-Netze
- **Active Directory** – Domains, Benutzer, Gruppen
- **Kommunikation** – Telefonanlagen, DECT, Mailboxen
- **Sicherheit** – Securepoint UTM/UMA (Firewalls), VPN
- **Geräte** – Kameras, Recorder, Drucker, FTP
- **Lizenzverwaltung** – Software-, Windows- und Zugriffslizenzen inkl. Ablaufdaten
- **Zugangsdaten** – Verschlüsselte Speicherung von Logins
- **Dateiablage** je Kunde
- **PDF-Export** der Dokumentation

## Voraussetzungen

Ein LAMP-Stack (PHP 8.0.2+, MySQL/MariaDB) sowie Grundkenntnisse in Webserver, PHP und MySQL.

## Installation

### Repository klonen

    git clone https://github.com/PhilippKuhlmann/it-dokumentation.git
    cd it-dokumentation

### Abhängigkeiten installieren

    composer install
    npm install

### Konfiguration

    cp .env.example .env
    # .env anpassen (Datenbank-Zugangsdaten etc.)

### App-Key erzeugen

    php artisan key:generate

### Datenbank migrieren und mit Demo-Daten befüllen

    php artisan migrate:fresh --seed

### Frontend bauen / Dev-Server

    npm run dev

## Rollen

| Rolle         | Rechte                                              |
| ------------- | --------------------------------------------------- |
| **Admin**     | Systemeinstellungen ändern, Zugriff auf alle Kunden |
| **Techniker** | Zugriff auf alle Kunden                             |
| **Kunde**     | Sieht nur die eigenen Daten                         |

## Demo-Zugänge

> ⚠️ **Nur für lokale Test-/Demo-Umgebungen.** Diese Accounts werden vom Seeder angelegt.
> Für den Produktivbetrieb unbedingt eigene Benutzer anlegen und die Demo-Accounts entfernen.

| Benutzername | Passwort | Rolle     |
| ------------ | -------- | --------- |
| admin        | password | Admin     |
| techniker    | password | Techniker |

## Mitwirken & Sicherheit

- Beiträge sind willkommen — siehe [CONTRIBUTING.md](CONTRIBUTING.md) und [CODE_OF_CONDUCT.md](CODE_OF_CONDUCT.md).
- Sicherheitslücken bitte gemäß [SECURITY.md](SECURITY.md) melden (nicht als öffentliches Issue).

## Lizenz

Veröffentlicht unter der [MIT-Lizenz](LICENSE).
