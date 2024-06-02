<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Candidate;

class EducationCandidatesSeeder extends Seeder
{
    public function run()
    {
        $names = ['Ursula Clark', 'Victor Lewis', 'Wendy Harris', 'Xander White'];

        foreach ($names as $name) {
            Candidate::create([
                'name' => $name,
                'role' => 'Education'
            ]);
        }
    }
}

