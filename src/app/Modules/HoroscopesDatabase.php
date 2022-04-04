<?php

namespace App\Modules;

use Illuminate\Support\Facades\DB;

class HoroscopesDatabase implements HoroscopesInterface
{
    public function getJapaneseName(string $yyyymmdd) : string
    {
        return DB::table('horoscope')->where('key', 'aries')->first()->name;
    }
}
