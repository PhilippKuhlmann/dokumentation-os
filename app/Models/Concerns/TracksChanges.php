<?php

namespace App\Models\Concerns;

use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * Aktiviert das Aktivitätsprotokoll (wer hat wann was geändert) für ein Model.
 *
 * Credential-Felder sind zwingend ausgeschlossen: spatie/activitylog liest Werte
 * über die Eloquent-Accessoren, d. h. verschlüsselte Felder würden sonst im
 * KLARTEXT im Protokoll landen.
 */
trait TracksChanges
{
    use LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logAll()
            ->logExcept([
                'password',
                'remotePassword',
                'bmcPassword',
                'dsrmpassword',
                'cloudBackupPassword',
                'encryptionkey',
                'uscpin',
                'remember_token',
                'created_at',
                'updated_at',
            ])
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs();
    }
}
