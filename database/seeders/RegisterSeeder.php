<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Register;
use App\Models\RegisterUser;

class RegisterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Register::truncate();
        RegisterUser::truncate();

        $registers = [
            [
                'class_name' => 'Toán ',
            ],
            [
                'class_name' => 'Ngữ văn ',
            ],
            [
                'class_name' => 'Tiếng anh ',
            ],
            [
                'class_name' => 'Vật lý ',
            ],
            [
                'class_name' => 'Hóa học ',
            ],
            [
                'class_name' => 'Lịch sử ',
            ],
            [
                'class_name' => 'Địa lý ',
            ]
        ];
        
        foreach($registers as $index => $register) {
            for($j = 1; $j <= 36; $j++) {
                Register::create([
                    'subject_id' => $index + 1,
                    'class_name' => $register['class_name'] . $j,
                    'quantity' => rand(50, 200),
                    'registered_quantity' => 0,
                    'study_time_id' => $j
                ]);
            }
        }
    }
}
