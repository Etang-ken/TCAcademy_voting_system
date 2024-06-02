<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Candidate;

class SecretaryCandidatesSeeder extends Seeder
{
    public function run()
    {
        $names = ['Ivy Clark', 'Jack White', 'Karen Harris', 'Leo Lewis'];

        foreach ($names as $name) {
            Candidate::create([
                'name' => $name,
                'role' => 'Secretary'
            ]);
        }
    }
}
