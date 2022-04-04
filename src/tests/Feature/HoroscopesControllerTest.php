<?php

namespace Tests\Feature;

use App\Modules\HoroscopesApi;
use App\Modules\HoroscopesBeta;
use App\Modules\HoroscopesInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HoroscopesControllerTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp(); //

        $mock = \Mockery::mock(HoroscopesInterface::class);
        $mock->shouldReceive('getJapaneseName');

        $this->instance(HoroscopesInterface::class, $mock);

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

//    public function test_誕生日をリクエストすると星座が返却される_v1()
//    {
//        $this->instance(HoroscopesInterface::class, new HoroscopesBeta());
//
//        $response = $this->get('/horoscopes/?birthday=1994-10-07');
//        $this->assertSame('天秤座', $response['horoscope_japanese_name']);
//    }

    public function test_誕生日をリクエストするとリクエストした誕生日がそのまま返却される()
    {
        $response = $this->get('/horoscopes/?birthday=1994-11-07');
        $this->assertSame('1994-11-07', $response['birthday']);
    }

    public function test_誕生日をリクエストしない場合は誕生日にnullが返却される()
    {
        $response = $this->get('/horoscopes/');
        $this->assertSame(null, $response['birthday']);
    }

    public function test_誕生日をリクエストすると星座が返却される()
    {
        $mock = \Mockery::mock(HoroscopesInterface::class);
        $mock->shouldReceive('getJapaneseName')
            ->with('19941107')
            ->once()
            ->andReturn('蠍座');

        $this->instance(HoroscopesInterface::class, $mock);

        $response = $this->get('/horoscopes/?birthday=1994-11-07');
        $this->assertSame('蠍座', $response['horoscope_japanese_name']);
    }
}
