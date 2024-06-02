<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Candidate;

class VicePresidentCandidatesSeeder extends Seeder
{
    public function run()
    {
        $names = ['Eve Brown', 'Frank Wilson', 'Grace Lee', 'Hank Moore'];

        foreach ($names as $name) {
            Candidate::create([
                'name' => $name,
                'role' => 'Vice President'
            ]);
        }
    }
}
