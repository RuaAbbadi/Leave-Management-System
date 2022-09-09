<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class LeaveTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('leavestype')->insert([
            'name' => 'Medical Leave',
            'description' =>'Medical Leave',
            'created_at'=> date('Y-m-d-H:i:s'),
        ]);
    }
}
