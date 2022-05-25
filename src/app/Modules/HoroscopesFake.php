<?php

namespace App\Modules;

use Illuminate\Support\Facades\Http;

class HoroscopesFake implements HoroscopesInterface
{
    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getJapaneseName(string $yyyymmdd) : string
    {
        $response = Http::timeout(3)
            ->get('http://fake-fortune-api.excite.jp/horoscopes?birthday='.$yyyymmdd);
        return $response->json()['name'];
    }
}
