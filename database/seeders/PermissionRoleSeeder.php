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

        $admin = \App\Models\Role::forceCreate([
            'id' => 1,
            'name' => 'Admin',
        ]);

        $techniker = \App\Models\Role::forceCreate([
            'id' => 10,
            'name' => 'Techniker',
        ]);

        $customerViewAny = \App\Models\Role::forceCreate([
            'name' => 'general_read',
            'description' => 'Standard Kunde lesen',
        ]);

        $customerDelete = \App\Models\Role::forceCreate([
            'name' => 'general_full',
            'description' => 'Standard Kunde Vollzugriff',
        ]);





        // Permissions
        $models = config('custom.permissions');

        $permissions = [
            'viewAny' => 'sehen',
            'create' => 'erstellen',
            'update' => 'bearbeiten',
            'delete' => 'löschen',
        ];


        foreach ($models as $model) {
            foreach ($permissions as $p => $pn) {
                ${strtolower($model).'_'.$p} = \App\Models\Permission::forceCreate([
                    'name' => strtolower($model).'_'.$p,
                    'description' => $model.' '.$pn,
                ]);
            }
        }


        $see_hidden = \App\Models\Permission::forceCreate([
            'name' => 'see_hidden',
            'description' => 'Verstecke Objekte sehen'
        ]);

        $create_pdf = \App\Models\Permission::forceCreate([
            'name' => 'create_pdf',
            'description' => 'PDF erstellen'
        ]);


        // PermissionRole

        // admin
        $permissions = Permission::all();
        foreach ($permissions as $permission) {
            $admin->assignPermission($permission);
        }

        // techniker
        $permissions = Permission::all();
        foreach ($permissions as $permission) {
            $techniker->assignPermission($permission);
        }

        // standard kunde lesen
        $permissions = Permission::getviewAny()->get();
        foreach ($permissions as $permission) {
            $customerViewAny->assignPermission($permission);
        }

        // standard kunde lesen schreiben
        $permissions = Permission::getviewAny()->get();
        foreach ($permissions as $permission) {
            $customerDelete->assignPermission($permission);
        }

        $permissions = Permission::getcreate()->get();
        foreach ($permissions as $permission) {
            $customerDelete->assignPermission($permission);
        }

        $permissions = Permission::getupdate()->get();
        foreach ($permissions as $permission) {
            $customerDelete->assignPermission($permission);
        }

        $permissions = Permission::getdelete()->get();
        foreach ($permissions as $permission) {
            $customerDelete->assignPermission($permission);
        }





    }
}
