<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



class LeaveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('leaves')->insert([
            'emp_id' => 1,
            'leavetype_id' => 1,
            'start_date' =>'2022-09-06',
            'end_date' =>'2022-09-10',
            'description' =>'I am Sick',
            'leavestatus' =>1,
           
        ]);
        
    }
}
