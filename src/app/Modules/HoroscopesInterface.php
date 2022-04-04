<?php

namespace App\Modules;

interface HoroscopesInterface
{
    public function getJapaneseName(string $yyyymmdd) : string;
}
