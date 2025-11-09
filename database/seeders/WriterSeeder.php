<?php

namespace Database\Seeders;

use App\Models\Writer;
use Illuminate\Database\Seeder;

class WriterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $writers = [
            [
                'name' => 'Raka Putra Wicaksono',
                'specialization' => 'Spesialis Interactive Multimedia',
                'bio' => 'Expert in interactive multimedia design and user experience.',
            ],
            [
                'name' => 'Bia Mecca Annisa',
                'specialization' => 'Spesialis Data Science',
                'bio' => 'Data scientist specializing in machine learning and deep learning.',
            ],
            [
                'name' => 'Abi Firmansyah',
                'specialization' => 'Spesialis Network Security',
                'bio' => 'Network security expert with years of experience in cybersecurity.',
            ],
            [
                'name' => 'Lia',
                'specialization' => 'Spesialis Software Engineering',
                'bio' => 'Software engineer focused on design patterns and agile methodologies.',
            ],
            [
                'name' => 'Husna',
                'specialization' => 'Spesialis Data Science',
                'bio' => 'Expert in natural language processing and AI technologies.',
            ],
        ];

        foreach ($writers as $writer) {
            Writer::create($writer);
        }
    }
}
