<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeveloperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $difficulty_levels = [1,2,3,4,5];
        foreach ($difficulty_levels as $difficulty_level) {
            DB::table('developers')->updateOrInsert(
                [
                    'name' => 'DEV'.$difficulty_level,
                    'hourly_difficulty' => $difficulty_level,
                ],
                []
            );
        }
    }
}
