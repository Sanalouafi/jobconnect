<?php

namespace Database\Seeders;

use \App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CampanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    Company::factory(10)->create();
}
}
