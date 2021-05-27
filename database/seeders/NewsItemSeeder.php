<?php

namespace Database\Seeders;

use App\Models\NewsItem;
use Illuminate\Database\Seeder;

class NewsItemSeeder extends MediaSeeder
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
            'summary' => 'Bekijk nu de nieuwste boeren die partner zijn van het Tiny Restaurant!',
        ],[
            'title' => 'Het eerste bericht!',
            'description' => '<p><strong>De nieuwe website staat online!</strong></p><p>Bekijk nu alle functionaliteiten op de website:</p><ul><li>Gemeentes</li><li>Boeren</li><li>Nieuwsberichten</li><li>Pagina\'s</li></ul>',
            'summary' => 'Onze nieuwe website staat online. Bekijk nu alle functionaliteiten!',
        ]);

        foreach ($newsItems as $newsItem)
        {
            $model = NewsItem::create([
               'title' => $newsItem["title"],
                'description' => $newsItem["description"],
                'summary' => $newsItem["summary"],
                'published' => true,
            ]);

            $this->seed_media(
                "App\Models\NewsItem",
                $model->id,
                "cover",
                preg_replace('/[^a-z]/', "_", strtolower($model->title)).".jpg",
                "Foto voor ".$model->title,
            );
        }
    }
}
