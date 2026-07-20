# Sicherheitsrichtlinie

## Unterstützte Versionen

Das Projekt nutzt eine datumsbasierte Versionierung (`JJ.MM.TT`, siehe [changelog.md](changelog.md)).
Sicherheitsrelevante Fixes fließen in die jeweils aktuelle Version ein — bitte halte deine
Installation aktuell.

## Sicherheitslücke melden

Bitte melde Sicherheitslücken **nicht** über öffentliche GitHub-Issues.

Sende stattdessen eine E-Mail an den Maintainer (siehe GitHub-Profil des Repository-Inhabers)
mit einer Beschreibung der Lücke und — wenn möglich — Schritten zur Reproduktion. Du erhältst
so schnell wie möglich eine Rückmeldung; behobene Lücken werden im Changelog vermerkt.

## Hinweise zum Sicherheitsmodell

- **Credentials at rest**: In der Anwendung gespeicherte Passwörter (Geräte, Logins usw.) werden
  mit dem Laravel-`APP_KEY` verschlüsselt (`Crypt`). Der `APP_KEY` ist damit der Generalschlüssel —
  sichere ihn und binde ihn in deine Backup-Strategie ein. Bei Verlust sind alle gespeicherten
  Credentials unlesbar.
- **Sessions** werden verschlüsselt gespeichert (`SESSION_ENCRYPT=true`), Cookies sind `HttpOnly`
  und in Produktion `Secure` (nur HTTPS).
- **Betrieb**: Die Anwendung ist für den Betrieb hinter HTTPS vorgesehen. In Produktion
  (`APP_ENV=production`) werden URLs automatisch auf HTTPS erzwungen.
- **Demo-Zugänge**: Die vom Seeder angelegten Demo-Accounts (`admin`/`password` usw.) sind nur
  für lokale Test-Umgebungen gedacht und müssen in Produktion entfernt werden.
