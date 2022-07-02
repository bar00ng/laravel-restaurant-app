<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\Products::factory(10)->create();

        \App\Models\Categories::create(['name' => 'Tea']);
        \App\Models\Categories::create(['name' => 'Non Coffee']);
        \App\Models\Categories::create(['name' => 'Coffee']);
        \App\Models\Categories::create(['name' => 'Brunch']);
        \App\Models\Categories::create(['name' => 'Lunch']);
        \App\Models\Categories::create(['name' => 'Desert']);

        \App\Models\Products::create(['name' => 'Kopi Original','price' => '20000','category_id'=>'3']);
        \App\Models\Products::create(['name' => 'Kopi Creamy','price' => '20000','category_id'=>'3']);
        \App\Models\Products::create(['name' => 'Es Teh Manis','price' => '20000','category_id'=>'1']);
        \App\Models\Products::create(['name' => 'Lemon Tea','price' => '20000','category_id'=>'1']);
        \App\Models\Products::create(['name' => 'Pop Ice Taro','price' => '20000','category_id'=>'2']);
        \App\Models\Products::create(['name' => 'Ice Chocolate','price' => '20000','category_id'=>'2']);
        \App\Models\Products::create(['name' => 'Croffle','price' => '20000','category_id'=>'4']);
        \App\Models\Products::create(['name' => 'Roti Panggang','price' => '20000','category_id'=>'4']);
        \App\Models\Products::create(['name' => 'Nasi Goreng','price' => '20000','category_id'=>'5']);
        \App\Models\Products::create(['name' => 'Nasi Uduk','price' => '20000','category_id'=>'5']);
        \App\Models\Products::create(['name' => 'Pudding Cokelat','price' => '20000','category_id'=>'6']);
        \App\Models\Products::create(['name' => 'Black Forest','price' => '20000','category_id'=>'6']);

        \App\Models\User::create(['name' => 'Zaky', 'username' => 'admin', 'email' => 'admin@example.com', 'password' => bcrypt('admin123')]);
    }
}
