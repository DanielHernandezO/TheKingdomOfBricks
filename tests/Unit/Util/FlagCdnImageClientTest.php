<?php

namespace Tests\Unit\Util;

use App\Util\FlagCdnImageClient;
use Tests\TestCase;

class FlagCdnImageClientTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_get_flag(): void
    {   
        //ARRANGE
        $countryId = 'AR';
        $expectedUrl = 'https://www.someurl.com'.'/w320/'.strtolower($countryId).'.png';
        $flagCdnImageClient = new FlagCdnImageClient();

        //ACT
        $responseUrl = $flagCdnImageClient->getFlag($countryId);

        //ASSERT
        $this->assertTrue($expectedUrl == $responseUrl);
    }
}
