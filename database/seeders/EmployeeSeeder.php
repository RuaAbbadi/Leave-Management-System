<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            'name' => 'Roa Abadi',
            'email' => 'abbadirua@gmail.com',
            'password'  => Hash::make('password'),
            'gender' =>'Female',
            'department_id' => 1,
            'phonenumber' => '0599765406',
            'address' => 'Jenin',
            'role'=>'admin',
            'created_at'=> date('Y-m-d-H:i:s'),
        ]);
    }
}
