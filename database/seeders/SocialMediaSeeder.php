<?php

namespace Database\Seeders;

use App\Models\SocialMedia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SocialMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $socialMedias = [
            ['platform' => 'facebook',  'username' => 'chhea.kim.official'],
            ['platform' => 'twitter',   'username' => 'kimchhea_tw'],
            ['platform' => 'instagram', 'username' => 'kim_insta'],
            ['platform' => 'linkedin',  'username' => 'kimchhea.dev'],
            ['platform' => 'facebook',  'username' => 'cambotech.news'],
            ['platform' => 'instagram', 'username' => 'devlife_kh'],
            ['platform' => 'twitter',   'username' => 'kh_coders'],
            ['platform' => 'linkedin',  'username' => 'techkh-careers'],
            ['platform' => 'other',     'username' => 'khtech.community'],
            ['platform' => 'facebook',  'username' => 'learn2code.kh'],
        ];
       foreach($socialMedias as $socialMedia)
       {
        SocialMedia::create($socialMedia);
       }
    }
}
