<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CertificationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      
        $certifications = ['BS', 'MS', 'PhD'];

        
        foreach ($certifications as $certification) {
            DB::table('certifications')->insert([
                'name' => $certification,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
