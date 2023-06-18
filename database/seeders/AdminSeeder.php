<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // admin seeder
        $admin = Admin::create([
           'name' => 'admin',
           'email' => 'amt@admin.com',
           'password' => bcrypt(123123123)
        ]);
        // supervisor seeder
        $super = User::create([
            'staff_id' => '855666',
            'name' => 'supervisor',
            'email' => 'super@super.com',
            'password' => bcrypt(123123123),
            'image' => 'image.png',
            'person_type' => 'super'
        ]);
    }
}
