<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Category::create([
            'name'=>'Sociedad',
        ]);
        App\Category::create([
            'name'=>'Deportiva',
        ]);
        App\Category::create([
            'name'=>'Politica',
        ]);
        App\Category::create([
            'name'=>'Economia',
        ]);
        App\Category::create([
            'name'=>'Espectaculo',
        ]);
        App\Category::create([
            'name'=>'Ciencia',
        ]);
        App\Category::create([
            'name'=>'Locales',
        ]);
        App\Category::create([
            'name'=>'Internacionales',
        ]);
    }
}
