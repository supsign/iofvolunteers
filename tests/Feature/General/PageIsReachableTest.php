<?php

namespace Tests\Feature\General;

use Tests\TestCase;

class PageIsReachableTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_main_page_is_reachable()
    {
        $this->withoutExceptionHandling();

        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
