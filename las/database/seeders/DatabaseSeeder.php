<?php

namespace Database\Seeders;

use App\Models\CourseSubject;
use App\Models\CourseYear;
use App\Models\Document;
use App\Models\Group;
use App\Models\schoolCareer;
use App\Models\Subject;
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
        $this->call([
            CourseSeeder::class,
            GroupSeeder::class,
            SubjectSeeder::class,
            StudentSeeder::class,
            CourseYearSeeder::class,
            UserSeeder::class,
            schoolCareerSeeder::class,
            SubjectResultsSeeder::class,
            DocumentSeeder::class,
            CourseSubjectSeeder::class,
        ]);

    }
}
