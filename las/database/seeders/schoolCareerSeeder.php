<?php

namespace Database\Seeders;

use App\Models\schoolCareer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class schoolCareerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        schoolCareer::factory()->count(30)->create();
    }
}
