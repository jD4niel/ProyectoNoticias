<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Role::create([
            'tipo'=>'root',
        ]);
        App\Role::create([
            'tipo'=>'Autor',
        ]);
        App\Role::create([
            'tipo'=>'Usuario',
        ]);
    }
}
