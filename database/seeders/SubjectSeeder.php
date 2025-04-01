<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Subject;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Subject::truncate();

        $subjects = [
            [
                'code' => 'math',
                'subject_name' => 'Toán học'
            ],
            [
                'code' => 'literature',
                'subject_name' => 'Ngữ văn'
            ],
            [
                'code' => 'english',
                'subject_name' => 'Tiếng anh'
            ],
            [
                'code' => 'physics',
                'subject_name' => 'Vật lý'
            ],
            [
                'code' => 'chemistry',
                'subject_name' => 'Hóa học'
            ],
            [
                'code' => 'history',
                'subject_name' => 'Lịch sử'
            ],
            [
                'code' => 'geography',
                'subject_name' => 'Địa lý'
            ],
        ];
        foreach($subjects as $subject) {
            Subject::create($subject);
        }
    }
}
