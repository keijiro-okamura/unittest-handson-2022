<?php

namespace Tests\Feature;

use App\Modules\HoroscopesBeta;
use App\Modules\HoroscopesInterface;
use Tests\TestCase;

class HoroscopesGetRequestTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

         $this->instance(HoroscopesInterface::class, new HoroscopesBeta());
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_GETリクエスト成功時は200を返却する()
    {
        $response = $this->get('/horoscopes/');
        $response->assertStatus(200);
    }

    public function test_誕生日をリクエストすると誕生日がそのまま返却されることのテスト()
    {
        $birthday = '1994-11-07';

        $response = $this->get("/horoscopes/?birthday=$birthday");
        $this->assertSame($birthday, $response['birthday']);
    }

    public function test_誕生日をリクエストすると星座の日本語名が返却されることのテスト()
    {
        $birthday = '1994-11-07';

        $mock = \Mockery::mock(HoroscopesInterface::class);
        $mock->shouldReceive('getJapaneseName')
            ->andReturn('蠍座');

        $this->instance(HoroscopesInterface::class, $mock);

        $response = $this->get("/horoscopes/?birthday=$birthday");
        $this->assertSame('蠍座', $response['horoscope_japanese_name']);
    }

    public function test_誕生日をリクエストすると整形された誕生日が星座取得関数に渡されることのテスト()
    {
        $birthday = '1994-11-07';
        $expected_birthday = '19941107';

        $mock = \Mockery::mock(HoroscopesInterface::class);
        $mock->shouldReceive('getJapaneseName')
            ->with($expected_birthday)
            ->once();

        $this->instance(HoroscopesInterface::class, $mock);

        $this->get("/horoscopes/?birthday=$birthday");
    }
}
