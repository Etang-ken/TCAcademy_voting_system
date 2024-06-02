<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Candidate;

class TreasurerCandidatesSeeder extends Seeder
{
    public function run()
    {
        $names = ['Quincy Green', 'Rachel King', 'Sam Wright', 'Tina Martin'];

        foreach ($names as $name) {
            Candidate::create([
                'name' => $name,
                'role' => 'Treasurer'
            ]);
        }
    }
}
