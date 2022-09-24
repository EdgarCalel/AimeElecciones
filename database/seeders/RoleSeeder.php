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
        Permission::create(['name'=>'directiva.create'])->syncRoles([$roleAdmin, $roleProfesor]);
        Permission::create(['name'=>'directiva.edit'])->syncRoles([$roleAdmin, $rolestudent, $roleProfesor]);

        Permission::create(['name'=>'usuarios.index'])->syncRoles([$roleAdmin]);
        Permission::create(['name'=>'usuarios.create'])->syncRoles([$roleAdmin]);
        Permission::create(['name'=>'usuarios.edit'])->syncRoles([$roleAdmin]);

        Permission::create(['name'=>'estudiante.index'])->syncRoles([$roleAdmin, $roleProfesor]);
        Permission::create(['name'=>'estudiante.create'])->syncRoles([$roleAdmin,  $roleProfesor]);
        Permission::create(['name'=>'estudiante.edit'])->syncRoles([$roleAdmin]);
        
        Permission::create(['name'=>'grado.index'])->syncRoles([$roleAdmin, $roleProfesor]);
        Permission::create(['name'=>'grado.create'])->syncRoles([$roleAdmin,  $roleProfesor]);
        Permission::create(['name'=>'grado.edit'])->syncRoles([$roleAdmin]);
        
        Permission::create(['name'=>'profesor.index'])->syncRoles([$roleAdmin]);
        Permission::create(['name'=>'profesor.create'])->syncRoles([$roleAdmin]);
        Permission::create(['name'=>'profesor.edit'])->syncRoles([$roleAdmin]);

        Permission::create(['name'=>'directiva.destroy'])->syncRoles([$roleAdmin]);

        Permission::create(['name'=>'admin'])->syncRoles([$roleAdmin, $roleProfesor]);

    }
}
