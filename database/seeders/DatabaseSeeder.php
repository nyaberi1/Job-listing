<?php

namespace Database\Seeders;

use App\Models\Job;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'first_name' => 'Joshua',
            'last_name' => 'Nyaberi',
            'email' => 'kjoshuan001@gmail.com',
        ]);

        $this->call(JobSeeder::class);
       
    }
}
