<?php

namespace Database\Seeders;

use App\Models\SubjectResult;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectResultsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SubjectResult::factory()->count(10)->create();
    }
}
