<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleAdmin = Role::create(['name'=>'Director']);
        $roleProfesor = Role::create(['name'=>'Profesor']);
        $rolestudent = Role::create(['name'=>'Estudiante']);

        Permission::create(['name'=>'admin.directiva.index'])->syncRoles([$roleAdmin, $roleProfesor, $rolestudent]);
        Permission::create(['name'=>'admin.directiva.create'])->syncRoles([$roleAdmin, $roleProfesor]);
        Permission::create(['name'=>'admin.directiva.edit'])->syncRoles([$roleAdmin]);
        Permission::create(['name'=>'admin.directiva.destroy'])->syncRoles([$roleAdmin]);

        Permission::create(['name'=>'admin.home'])->syncRoles([$roleAdmin, $roleProfesor, $rolestudent]);

    }
}
