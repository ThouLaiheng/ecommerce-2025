<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(){
        $this->call([
            UserSeeder::class,
            PostSeeder::class,
            // Other seeders can be called here
        ]);
    }
    {
        //
    }
}
