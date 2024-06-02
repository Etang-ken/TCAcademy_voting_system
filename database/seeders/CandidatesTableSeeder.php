<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Candidate;

class CandidatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = ['President', 'Vice President', 'Secretary', 'Socials', 'Treasurer', 'Education', 'Discipline'];
        $names = ['John Doe', 'Jane Smith', 'Alice Johnson', 'Bob Brown'];

        foreach ($roles as $role) {
            foreach ($names as $name) {
                Candidate::create([
                    'name' => $name,
                    'role' => $role
                ]);
            }
        }

    }
}
