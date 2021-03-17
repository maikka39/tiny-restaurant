<?php

namespace Database\Seeders;

use A17\Twill\Models\User;
use Illuminate\Database\Seeder;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => "Admin",
            'email' => 'admin@admin.dev',
            'role' => 'SUPERADMIN',
            'published' => true,
            'password' => \Hash::make('dev123'),
        ]);
    }
}
