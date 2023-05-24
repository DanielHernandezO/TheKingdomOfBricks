<?php

namespace Tests\Unit;

use Tests\TestCase;

class userItemControllerTest extends TestCase
{
    public function testUserItemcontroller(): void
    {
        //ACT
        $response = $this->get('/items');

        //ASSERT
        $response->assertStatus(200)
            ->assertViewIs('user.item.index')
            ->assertViewHas('viewData.type')
            ->assertViewHas('viewData.items');
    }
}
