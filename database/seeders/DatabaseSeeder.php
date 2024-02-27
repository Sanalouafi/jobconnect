<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Experience;
use Database\Seeders\ExperienceSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // $this->call([
        //     RoleSeeder::class,
        // ]);

        \App\Models\Company::factory(5)->create();
        \App\Models\Experience::factory(5)->create();
        // Experience::create([
        //     'name' => $this->faker->jobTitle,
        //     'start_date' => $this->faker->date(),
        //     'end_date' => $this->faker->date(),
        //     'company_name' => $this->faker->company,
        //     'description' => $this->faker->paragraph,
        //     'task' => $this->faker->sentence,
        //     'user_id' => 2,
        // ]);

    }
}
