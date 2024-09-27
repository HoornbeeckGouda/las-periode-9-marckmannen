<?php

namespace Database\Seeders;

use App\Models\CourseYear;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CourseYear::factory()->count(10)->create();
    }
}
