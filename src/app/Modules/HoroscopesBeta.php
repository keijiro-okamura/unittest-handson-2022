<?php

namespace App\Modules;

use Illuminate\Support\Facades\DB;

class HoroscopesBeta implements HoroscopesInterface
{
    public function getJapaneseName(string $yyyymmdd): string
    {
        return $this->getZodiacFromDateTime(new \DateTimeImmutable($yyyymmdd));
    }

    private function getZodiacFromDateTime($datetime)
    {
        $m = (int)$datetime->format("n");
        $d = (int)$datetime->format("j");

        $zodiacs = [
            // '名前', 月, 日　～　月, 日
            ['牡羊座', 3, 21, 4, 19],
            ['牡牛座', 4, 20, 5, 20],
            ['双子座', 5, 21, 6, 21],
            ['かに座', 6, 22, 7, 22],
            ['獅子座', 7, 23, 8, 22],
            ['乙女座', 8, 23, 9, 22],
            ['天秤座', 9, 23, 10, 23],
            ['蠍座', 10, 24, 11, 22],
            ['射手座', 11, 23, 12, 21],
            ['山羊座', 12, 22, 1, 19],
            ['水瓶座', 1, 20, 2, 18],
            ['魚座', 2, 19, 3, 20]
        ];

        foreach ($zodiacs as $zodiac) {
            [$name, $start_m, $start_d, $end_m, $end_d] = $zodiac;
            if (
                ($m === $start_m && $d >= $start_d) ||
                ($m === $end_m && $d <= $end_d)
            ) {
                return $name;
            }
        }
        return false;
    }
}
