<?php

namespace Database\Seeders;

use App\Models\Fasilitas;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // buat user admin
        User::create([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => 'password',
            'role' => 'admin'
        ]);

        $data = ['ac', 'toilet', 'kamar mandi', 'wifi'];

        foreach ($data as $item) {
            Fasilitas::create([
                'name' => $item
            ]);
        }
    }
}
