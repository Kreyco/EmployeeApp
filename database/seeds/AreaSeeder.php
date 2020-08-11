<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('areas')->insert(['name' => 'Administración', 'created_at' => now(), 'updated_at' => now()]);
        DB::table('areas')->insert(['name' => 'Recursos humanos', 'created_at' => now(), 'updated_at' => now()]);
    }
}
