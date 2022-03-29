<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Horoscope extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $horoscope = \App\Models\Horoscope::create([
            'key'  => 'aries',
            'name' => '牡羊',
        ]);
        $horoscope = \App\Models\Horoscope::create([
            'key'  => 'taurus',
            'name' => '牡牛',
        ]);
        $horoscope = \App\Models\Horoscope::create([
            'key'  => 'gemini',
            'name' => '双子',
        ]);
        $horoscope = \App\Models\Horoscope::create([
            'key'  => 'cancer',
            'name' => '蟹',
        ]);
        $horoscope = \App\Models\Horoscope::create([
            'key'  => 'leo',
            'name' => '獅子',
        ]);
        $horoscope = \App\Models\Horoscope::create([
            'key'  => 'virgo',
            'name' => '乙女',
        ]);
        $horoscope = \App\Models\Horoscope::create([
            'key'  => 'libra',
            'name' => '天秤',
        ]);
        $horoscope = \App\Models\Horoscope::create([
            'key'  => 'scorpio',
            'name' => '蠍',
        ]);
        $horoscope = \App\Models\Horoscope::create([
            'key'  => 'sagittarius',
            'name' => '射手',
        ]);
        $horoscope = \App\Models\Horoscope::create([
            'key'  => 'capricorn',
            'name' => '山羊',
        ]);
        $horoscope = \App\Models\Horoscope::create([
            'key'  => 'aquarius',
            'name' => '水瓶',
        ]);
        $horoscope = \App\Models\Horoscope::create([
            'key'  => 'pisces',
            'name' => '魚',
        ]);
    }
}
