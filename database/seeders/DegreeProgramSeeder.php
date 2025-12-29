<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DegreeProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];
        $programs = ['Computer Science', 'Software Engineering', 'BS Physics', 'BS Mathematics', 'Business Administration', 'Mechanical Engineering', 'Media Sciences', 'Biomedical Engineering'];
        foreach ($programs as $program) {
            if (!\App\Models\DegreeProgram::where('name', $program)->exists()) {
                $data[] = [
                    'name' => $program,
                    'status' => 'active',
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }
        \App\Models\DegreeProgram::insert($data);
    }
}
