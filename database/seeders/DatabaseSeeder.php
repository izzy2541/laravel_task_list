<?php

namespace Database\Seeders;

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
        //Specifies how many models we want to create
        //adds data on top of pre existing data using factory settings defined in UserFactory.php
        User::factory(10)->create();
        \App\Models\User::factory(2)->unverified()->create();
        \App\Models\Task::factory(20)->create();
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
