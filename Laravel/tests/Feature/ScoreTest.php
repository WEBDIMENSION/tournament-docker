<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Score\Api;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ScoreTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetTournament()
    {
        $api = new Api;
        $requestData = ['tournament_id'=>1];
        $ret = $api->getTournament(json_decode(json_encode($requestData))->tournament_id);
        $this->assertNotNull($ret);
        $objRet = json_decode($ret);
        $this->assertNotNull($objRet->round);
    }
}
