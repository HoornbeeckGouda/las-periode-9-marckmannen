<?php

namespace Database\Seeders;

use App\Models\SchoolCarreer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchoolCarreerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SchoolCarreer::factory()->count(30)->create();
    }
}
