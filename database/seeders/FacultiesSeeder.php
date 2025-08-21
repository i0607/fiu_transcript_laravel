<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacultiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $faculties = [
        [
                'id' => 1,
                'title' => 'Faculty of Engineering'
        ],
        [
                'id' => 3,
                'title' => 'others'
        ],
        [
                'id' => 2,
                'title' => 'Faculty of Economics and Administrative Sciences'
            ]
        ];
                DB::table('faculties')->insert($faculties);

    }
}
