<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'first_name' => "Luna",
            'last_name' => "Maya",
            'email' => 'luna@maya.com',
            'phone_number' => '0812989123',
            'department_name' => 'IT',
            'start_date' => Carbon::parse('2020-01-01'),
            'end_date' => null,
        ]);
        DB::table('employees')->insert([
            'first_name' => "Ariel",
            'last_name' => "Noah",
            'email' => 'ariel@mail.com',
            'phone_number' => '0801283111',
            'department_name' => 'Finance',
            'start_date' => Carbon::parse('2020-05-01'),
            'end_date' => null,
        ]);
    }
}
