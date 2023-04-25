<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class contact_settingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
                DB::table('contact_settings')->insert([
                'contact_setting_address' => '235/A noyatola moghbazar',
                
                ]);
                DB::table('contact_settings')->insert([
                'contact_phone' => '01402567942',
                ]);
                DB::table('contact_settings')->insert([
                'email_contact' => 'portolioasad29"gmail.com',
                ]);
    }
}
