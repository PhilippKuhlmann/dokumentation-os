<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MailboxProvidorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\MailboxProvider::factory()->create([
            'name' => 'EWE',
            'pop3server' => 'pop.ewe.net',
            'pop3port' => '995',
            'imapserver' => 'imap.ewe.net',
            'imapport' => '993',
            'smtpserver' => 'smtp.ewe.net',
            'smtpport' => '587',
        ]);

        \App\Models\MailboxProvider::factory()->create([
            'name' => 'IONOS',
            'pop3server' => 'pop.ionos.de',
            'pop3port' => '995',
            'imapserver' => 'imap.ionos.de',
            'imapport' => '993',
            'smtpserver' => 'smtp.ionos.de',
            'smtpport' => '465',
        ]);

        \App\Models\MailboxProvider::factory()->create([
            'name' => 'STRATO',
            'pop3server' => 'pop3.strato.de',
            'pop3port' => '995',
            'imapserver' => 'imap.strato.de',
            'imapport' => '993',
            'smtpserver' => 'smtp.strato.de',
            'smtpport' => '465',
        ]);

        \App\Models\MailboxProvider::factory()->create([
            'name' => 'Experia',
            'pop3server' => 'mail.experia.eu',
            'pop3port' => '995',
            'imapserver' => 'mail.experia.eu',
            'imapport' => '993',
            'smtpserver' => 'smtp.experia.eu',
            'smtpport' => '465',
        ]);

        \App\Models\MailboxProvider::factory()->create([
            'name' => 'Hetzner',
            'pop3server' => 'mail.your-server.de',
            'pop3port' => '995',
            'imapserver' => 'mail.your-server.de',
            'imapport' => '993',
            'smtpserver' => 'mail.your-server.de',
            'smtpport' => '465',
        ]);

        \App\Models\MailboxProvider::factory()->create([
            'name' => 'Jimdo',
            'pop3server' => 'secure.emailsrvr.com',
            'pop3port' => '995',
            'imapserver' => 'secure.emailsrvr.com',
            'imapport' => '993',
            'smtpserver' => 'secure.emailsrvr.com',
            'smtpport' => '465',
        ]);

    }
}
