<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Seeders\UsersTableSeeder as SeedersUsersTableSeeder;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
       
        $this->call(CertificationsSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call( CertificateUserSeeder::class);
        
    }
}
