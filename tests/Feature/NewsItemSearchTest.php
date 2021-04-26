<?php

namespace Tests\Feature;

use App\Models\NewsItem;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsItemSearchTest extends TestCase
{
    use DatabaseMigrations, WithFaker;

    /**
     * @var Collection
     */
    private $newsItems = [];
    protected function setUp(): void
    {
        parent::setUp();
        $this->setUpFaker();
        $this->newsItems = NewsItem::factory(25)->create();
    }

    /**
     * Checking if the news items page can be rendered
     * If not, non of these tests wil work
     *
     * @test search_page_can_be_rendered
     * @return void
     */
    public function search_page_can_be_rendered()
    {
        $response = $this->get('/nieuws');
        $response->assertStatus(200);
        $response->assertSee('Nieuwsberichten');
    }

    /**
     * Searching for the title of a news item
     * Should return just 1 record
     *
     * @return void
     */
    public function search_exact_title()
    {
        $response = $this->get('/nieuws');

        $response->assertStatus(200);
    }
}
