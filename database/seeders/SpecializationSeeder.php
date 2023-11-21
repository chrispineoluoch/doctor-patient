<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('specializations')->insert([
            ['specialization' => 'Cardiology'],
            ['specialization' => 'Pediatrics'],
            ['specialization' => 'Dermatology'],
        ]);
    }
}
