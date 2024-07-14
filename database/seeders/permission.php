<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class permission extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("permission")->insert([
            ["role" => "Học sinh"],
            ["role" => "Admin"],
            ["role" => "Giảng viên"],
        ]);
    }
}
