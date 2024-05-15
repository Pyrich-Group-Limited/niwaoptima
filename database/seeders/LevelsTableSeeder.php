<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Level;

class LevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $levels = [
            'Level 1',
            'Level 2',
            'Level 3',
            'Level 4',
            'Level 5',
            'Level 6',
            'Level 7',
            'Level 8',
            'Level 9',
            'Level 10',
            'Level 11',
            'Level 12',
            'Level 13',
            'Level 14',
            'Level 15',
            'Level 16',
            'Level 17',
            'Level 18',
        ];

        foreach ($levels as $level) {
            Level::create(['name' => $level]);
        }
    }
}
