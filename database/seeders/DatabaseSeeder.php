<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         \App\Models\User::factory(10)->create();
         \App\Models\Event::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'zahra',
            'email' => 'zahraaa.syi@gmail.com',
            'birthday' => '1/1/11',
            'gender' => 'female',
            'phone' => '09186415765' ,
            'password' => bcrypt('123456')
           ]);

    }
}
