<?php

namespace Database\Seeders;

use App\Models\NewsItem;
use Illuminate\Database\Seeder;

class NewsItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newsItems = array([
            'title' => 'Er staan nu boeren op de pagina!',
            'description' => '<p>Bekijk nu de nieuwste boeren die partner zijn van het Tiny Restaurant!</p><p><a href="https://tiny-restaurant.test/boer/ton-van-de-vossenberg" rel="noopener noreferrer" target="_blank">Ton van de Vossenberg</a> en <a href="https://tiny-restaurant.test/boer/hans-van-lierop" rel="noopener noreferrer" target="_blank">Hans van Lierop</a></p>',
        ],[
            'title' => 'Het eerste bericht!',
            'description' => '<h3>De nieuwe website staat online!</h3><p>Bekijk nu alle functionaliteiten op de website:</p><ul><li>Gemeentes</li><li>Boeren</li><li>Nieuwsberichten</li><li>Pagina\'s</li></ul>',
        ]);

        foreach ($newsItems as $newsItem)
        {
            NewsItem::create([
               'title' => $newsItem["title"],
                'description' => $newsItem["description"],
                'published' => true,
            ]);
        }
    }
}
