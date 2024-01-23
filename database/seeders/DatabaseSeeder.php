<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
            'admin' => true
        ]);

        \App\Models\User::factory(10)->create();


        $this->call(StateSeeder::class);
        $this->call(LotSeeder::class);
        $this->call(LotImageSeeder::class);
    }
}
