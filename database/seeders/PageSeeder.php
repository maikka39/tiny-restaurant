<?php

namespace Database\Seeders;

use A17\Twill\Models\Block;
use App\Models\Page;
use App\Models\Slugs\PageSlug;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages = array([
          "title" => 'Contact',
          "slug" => 'contact',
          "description" => 'Dit is de beschrijving van de contactpagina!',
          "blocks" => array([
              "type" => 'contact_form',
              "blockable_type" => 'App\\Models\\Page',
              "position" => 1,
              "content" => '{"title": "Contact", "description": "Neem direct contact met ons op via dit formulier!"}'
          ])
        ]);

        foreach ($pages as $page) {
            $model = Page::create([
                'title' => $page["title"],
                'description' => $page["description"]
            ]);

            PageSlug::create([
                'slug' => Str::slug($page["slug"]),
                'locale' => 'en',
                'active' => true,
                'page_id' => $model->id
            ]);

            foreach ($page["blocks"] as $blocks) {
                Block::create([
                    'type' => $blocks["type"],
                    'blockable_type' =>  $blocks["blockable_type"],
                    'position' => $blocks["position"],
                    'content' => json_decode($blocks["content"]),
                    'blockable_id' => $model->id
                ]);
            }
        }
    }
}
