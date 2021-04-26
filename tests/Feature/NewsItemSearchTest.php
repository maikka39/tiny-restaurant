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
     * @test
     * @return void
     */
    public function search_exact_title()
    {
        $newsItem = $this->newsItems->random();
        $response = $this
            ->followingRedirects()
            ->get('/nieuws?search=' . $newsItem->title);
        $response->assertSee($newsItem->title);
        $newsItems = $response->original['newsItems'];
        $this->assertCount(1, $newsItems);
    }

    public function search_description()
    {
        //fill in
    }
}
