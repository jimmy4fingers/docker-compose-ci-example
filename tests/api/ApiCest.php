<?php 

class ApiCest
{
    public function expectedResponseTest(ApiTester $I)
    {
        $I->sendGET('/');

        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); // 200
        $I->seeResponseIsJson();
    }
}
