<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Rollen

        $admin = \App\Models\Role::factory()->create([
            'id' => 1,
            'name' => 'Admin',
        ]);

        $techniker = \App\Models\Role::factory()->create([
            'id' => 2,
            'name' => 'Techniker',
        ]);

        \App\Models\Role::factory()->create([
            'id' => 98,
            'name' => 'Kunde R',
        ]);

        \App\Models\Role::factory()->create([
            'id' => 99,
            'name' => 'Kunde RW',
        ]);





        // Permission'
        $models = ['Site','Contactperson','Server','VM','NAS','SecurepointUTM','Router','Network','Wifi','Computer','Printer','ADDomain','ADUser','ADGroup','PhoneSystem','Phone','DECT','LoginGeneral','LoginNAS','LoginWebsite','SecurepointUMA','Mailbox','Recorder','Camera','LicenseSoftware','LicenseWindows','FTPServer','DynDNS','File'];

        $permissions = [
            'viewAny' => 'sehen',
            'create' => 'erstellen',
            'update' => 'bearbeiten',
            'delete' => 'löschen',
        ];


        foreach ($models as $model) {

            foreach ($permissions as $p => $pn) {

                ${strtolower($model).'_'.$p} = \App\Models\Permission::factory()->create([
                    'name' => strtolower($model).'_'.$p,
                    'description' => $model.' '.$pn,
                ]);

            }

        }







        // PermissionRole

        //admin
        $permissionns = Permission::all();
        foreach ($permissionns as $permissionn) {
            $admin->assignPermission($permissionn);
        }

        foreach ($permissionns as $permissionn) {
            $techniker->assignPermission($permissionn);
        }


    }
}
