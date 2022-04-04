<?php

namespace App\Modules;

use Illuminate\Support\Facades\Http;

class HoroscopesApi implements HoroscopesInterface
{
    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getJapaneseName(string $yyyymmdd) : string
    {
        $response = Http::timeout(3)
            ->get('http://hogehoge-api.co.jp/horoscopes?birthday='.$yyyymmdd);
        return $response->json()['name'];
    }
}
