<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\StudyTime;

class StudyTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StudyTime::truncate();

        $studyTimes = [
            [
                'user_id' => 2,
                'from_hour' => '09:00',
                'to_hour' => '11:00',
                'from_date' => '2025-02-10',
                'to_date' => '2025-05-10'
            ],
            [
                'user_id' => 2,
                'from_hour' => '14:00',
                'to_hour' => '16:00',
                'from_date' => '2025-02-10',
                'to_date' => '2025-05-10'
            ],
            [
                'user_id' => 2,
                'from_hour' => '20:00',
                'to_hour' => '22:00',
                'from_date' => '2025-02-10',
                'to_date' => '2025-05-10'
            ],
            [
                'user_id' => 3,
                'from_hour' => '09:00',
                'to_hour' => '11:00',
                'from_date' => '2025-02-10',
                'to_date' => '2025-05-10'
            ],
            [
                'user_id' => 3,
                'from_hour' => '14:00',
                'to_hour' => '16:00',
                'from_date' => '2025-02-10',
                'to_date' => '2025-05-10'
            ],
            [
                'user_id' => 3,
                'from_hour' => '20:00',
                'to_hour' => '22:00',
                'from_date' => '2025-02-10',
                'to_date' => '2025-05-10'
            ],
        ];
        for($i = 2; $i <= 7; $i++) {
            foreach($studyTimes as $studyTime) {
                $studyTime['weekday'] = $i;
                StudyTime::create($studyTime);
            }
        }
        
    }
}
