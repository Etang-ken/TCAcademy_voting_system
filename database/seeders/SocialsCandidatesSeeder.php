<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Candidate;

class SocialsCandidatesSeeder extends Seeder
{
    public function run()
    {
        $names = ['Mona Young', 'Nate Hall', 'Olivia Scott', 'Paul Adams'];

        foreach ($names as $name) {
            Candidate::create([
                'name' => $name,
                'role' => 'Socials'
            ]);
        }
    }
}
