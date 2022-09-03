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

        Permission::create(['name'=>'directiva.index'])->syncRoles([$roleAdmin, $roleProfesor, $rolestudent]);
        Permission::create(['name'=>'directiva.create'])->syncRoles([$roleAdmin]);
        Permission::create(['name'=>'directiva.edit'])->syncRoles([$roleAdmin]);

        Permission::create(['name'=>'usuarios.index'])->syncRoles([$roleAdmin]);
        Permission::create(['name'=>'usuarios.edit'])->syncRoles([$roleAdmin]);
        Permission::create(['name'=>'usuarios.update'])->syncRoles([$roleAdmin]);

        Permission::create(['name'=>'directiva.destroy'])->syncRoles([$roleAdmin]);

        Permission::create(['name'=>'admin.home'])->syncRoles([$roleAdmin, $roleProfesor, $rolestudent]);

    }
}
