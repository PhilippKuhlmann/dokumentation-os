# Mitwirken

Danke für dein Interesse, zu diesem Projekt beizutragen!

## Entwicklungsumgebung einrichten

```bash
git clone <repo-url>
cd dokuvault
composer install
npm install
cp .env.example .env
php artisan key:generate
# .env: Datenbank-Zugangsdaten eintragen
php artisan migrate:fresh --seed   # legt Demo-Daten inkl. Kunde "Mustermann" an
npm run dev
```

Demo-Logins nach dem Seeding: `admin` / `password` (Admin), `techniker` / `password` (Techniker).

## Tests

```bash
php artisan test
```

Die Tests laufen gegen SQLite in-memory (siehe `phpunit.xml`) — es ist keine eigene
Test-Datenbank nötig. Bitte stelle sicher, dass vor einem Pull Request **alle Tests grün** sind,
und ergänze für neue Features passende Tests (Muster: `tests/Feature/ComputerCrudTest.php`).

## Code-Stil

Das Projekt nutzt [Laravel Pint](https://laravel.com/docs/pint) (`pint.json`, Laravel-Preset):

```bash
./vendor/bin/pint --dirty
```

## Changelog & Versionierung

Die Version ist datumsbasiert (`JJ.MM.TT`). Bei jeder Änderung wird oben in `changelog.md`
ein Eintrag `## JJ.MM.TT` (heutiges Datum) ergänzt bzw. der heutige Eintrag erweitert —
mit Abschnitten `### Added` / `### Changed` / `### Fixed` / `### Internal`.
Die im Footer angezeigte Version wird automatisch aus dem obersten Eintrag gelesen.

## Pull Requests

- Ein Thema pro PR, mit kurzer Beschreibung (Was & Warum).
- Neue Objekttypen folgen dem bestehenden Muster (Migration, Model mit `TracksChanges`,
  Factory, Policy, Controller, FormRequest mit `BelongsToCustomer`-Rule, Views, Route,
  Eintrag in `config/custom.php` unter `permissions` und ggf. `trashables`).
- Sicherheitslücken bitte **nicht** als Issue melden — siehe [SECURITY.md](SECURITY.md).
