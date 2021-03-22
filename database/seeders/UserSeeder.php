<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Institution;
use App\Models\User;
use App\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	
         $role_id = Role::first()->id;
        User::create([
            'name' => "admin",
            'email' => "admin@admin.com",
            'phone' => "123456789",
            'password' => Hash::make("123456"),
            'institution_id' => null,
            'role_id' => $role_id 
        ]);
    }
}
