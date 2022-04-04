<?php

namespace App\Http\Controllers;

use App\Modules\HoroscopesApi;
use App\Modules\HoroscopesInterface;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class HoroscopesController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Exception
     */
    public function index(Request $request, HoroscopesInterface $horoscopes)
    {

        // 日付を星座キーに変換
        $birthday = $request->get('birthday');
        $birthday_yyyymmdd = (new \DateTimeImmutable($birthday))->format('Ymd');

        // 外部モジュールから星座名を取得
        $horoscope_japanese_name = $horoscopes->getJapaneseName($birthday_yyyymmdd);

        return view('horoscopes',
            [
                'birthday' => $birthday,
                'horoscope_japanese_name' => $horoscope_japanese_name,
            ]
        );
    }
}
