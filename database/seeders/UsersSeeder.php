<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        DB::table('users')->insert([
            [
                'name' =>"theadmin",
                'email' => 'admin@gmail.com',
                'gender' => $faker->randomElement(['Male', 'Female']),
                'blood_type' => $faker->randomElement(['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-']),
                'is_approved' => false,
                'is_admin' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],


            [
                'name' =>$faker->name,
                'email' => $faker->unique()->safeEmail,
                'gender' => $faker->randomElement(['Male', 'Female']),
                'blood_type' => $faker->randomElement(['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-']),
                'is_approved' => false,
                'is_admin' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],


            [
                'name' =>$faker->name,
                'email' => $faker->unique()->safeEmail,
                'gender' => $faker->randomElement(['Male', 'Female']),
                'blood_type' => $faker->randomElement(['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-']),
                'is_approved' => false,
                'is_admin' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],


            [
                'name' =>$faker->name,
                'email' => $faker->unique()->safeEmail,
                'gender' => $faker->randomElement(['Male', 'Female']),
                'blood_type' => $faker->randomElement(['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-']),
                'is_approved' => true,
                'is_admin' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' =>$faker->name,
                'email' => $faker->unique()->safeEmail,
                'gender' => $faker->randomElement(['Male', 'Female']),
                'blood_type' => $faker->randomElement(['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-']),
                'is_approved' => true,
                'is_admin' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],


           
        ]);
    }
}
