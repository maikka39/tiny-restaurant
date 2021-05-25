<?php

namespace Tests\Feature;

use Tests\TestCase;

class HomePageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @test
     *
     * @return void
     */
    public function loadHomePage()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
