<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Institution;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	
         $institution_id = Institution::first()->id;
        User::create([
            'name' => "admin",
            'email' => "admin@admin.com",
            'password' => Hash::make("123456"),
            'institution_id' => $institution_id
        ]);
    }
}
