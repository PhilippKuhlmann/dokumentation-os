<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GeneratePolicies extends Command
{
    protected $signature = 'generate:policies';

    protected $description = 'Generate multiple policies';

    public function handle()
    {
        $resources = ['Site','Contactperson','Server','VM','NAS','SecurepointUTM','Router','Network','Wifi','Computer','Printer','ADDomain','ADUser','ADGroup','PhoneSystem','Phone','DECT','LoginGeneral','LoginNAS','LoginWebsite','SecurepointUMA','Mailbox','Recorder','Camera','LicenseSoftware','LicenseWindows','FTPServer','DynDNS','File'];

        foreach ($resources as $resource) {
            $policyClass = "{$resource}Policy";
            $gateName = strtolower($resource);
            $filename = app_path("Policies/{$policyClass}.php");

            $this->generatePolicy($filename, $policyClass, $gateName);
        }

        $this->info('Policies generated successfully.');
    }

    protected function generatePolicy($filename, $policyClass, $gateName)
    {
        $stub = file_get_contents(base_path('stubs/policy.stub'));
        $stub = str_replace('{{policyClass}}', $policyClass, $stub);
        $stub = str_replace('{{gateName}}', $gateName, $stub);

        file_put_contents($filename, $stub);

        $this->info("Policy {$policyClass} generated successfully.");
    }
}
