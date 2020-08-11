<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert(['name' => 'Profesional de proyectos - Desarrollador', 'created_at' => now(), 'updated_at' => now()]);
        DB::table('roles')->insert(['name' => 'Gerente estratégico', 'created_at' => now(), 'updated_at' => now()]);
    }
}
