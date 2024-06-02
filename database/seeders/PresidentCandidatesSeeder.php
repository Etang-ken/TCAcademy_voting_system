<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Candidate;

class PresidentCandidatesSeeder extends Seeder
{
    public function run()
    {
        $names = ['Alice Smith', 'Bob Johnson', 'Charlie Davis', 'Diana Evans'];

        foreach ($names as $name) {
            Candidate::create([
                'name' => $name,
                'role' => 'President'
            ]);
        }
    }
}

