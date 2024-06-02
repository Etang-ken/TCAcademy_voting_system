<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Candidate;

class DisciplineCandidatesSeeder extends Seeder
{
    public function run()
    {
        $names = ['Yara Green', 'Zach King', 'Adam Wright', 'Bella Martin'];

        foreach ($names as $name) {
            Candidate::create([
                'name' => $name,
                'role' => 'Discipline'
            ]);
        }
    }
}
