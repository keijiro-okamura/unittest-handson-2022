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

        // $this->instance(HoroscopesInterface::class, new HoroscopesBeta());
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

    // TODO: ブラックボックステスト技法 or ホワイトボックステスト技法を意識して、テストケースを追加しよう
    // TODO: テストダブルを作成し、外部モジュールに依存しないテストを作成しよう
}
