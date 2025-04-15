<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StudyTime;
use Carbon\Carbon;

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
                'to_hour' => '11:00'
            ],
            [
                'user_id' => 2,
                'from_hour' => '14:00',
                'to_hour' => '16:00'
            ],
            [
                'user_id' => 2,
                'from_hour' => '20:00',
                'to_hour' => '22:00'
            ],
            [
                'user_id' => 3,
                'from_hour' => '09:00',
                'to_hour' => '11:00'
            ],
            [
                'user_id' => 3,
                'from_hour' => '14:00',
                'to_hour' => '16:00'
            ],
            [
                'user_id' => 3,
                'from_hour' => '20:00',
                'to_hour' => '22:00'
            ],
        ];
        for($i = 2; $i <= 7; $i++) {
            $fromDate = Carbon::now()->startOfWeek()->addDays($i - 2)->format('Y-m-d');
            $nextMonth = Carbon::now()->addMonth();
            $toDate = $nextMonth->startOfWeek()->addDays($i - 2)->format('Y-m-d');

            foreach($studyTimes as $studyTime) {
                $studyTime['weekday'] = $i;
                $studyTime['from_date'] = $fromDate;
                $studyTime['to_date'] = $toDate;
                StudyTime::create($studyTime);
            }
        }
        
    }
}
