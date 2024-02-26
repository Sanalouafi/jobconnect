<?php

namespace Database\Seeders;
use App\Models\Competency;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompetencySeeder extends Seeder
{
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            Competency::factory()->count(5)->create();
        }
    }
