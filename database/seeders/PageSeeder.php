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
          "title" => 'Neem Contact met ons op!',
          "slug" => 'contact',
          "description" => 'Dit is de beschrijving van de contact pagina!',
          "blocks" => array([
              "type" => 'contact_form',
              "blockable_type" => 'App\\Models\\Page',
              "position" => 1,
              "content" => '{"title": "Contact", "description": "Neem direct contact met ons op via dit formulier!"}'
          ])
        ]);

        foreach ($pages as $page) {
            $model = new Page();
            $model->title = $page["title"];
            $model->description = $page["description"];
            $model->save();

            $slug = new PageSlug();
            $slug->slug = Str::slug($page["slug"]);
            $slug->locale = 'en';
            $slug->active = true;
            $slug->page_id = $model->id;
            $slug->save();

            foreach ($page["blocks"] as $blocks) {
                $block = new Block();
                $block->type = $blocks["type"];
                $block->blockable_type =  $blocks["blockable_type"];
                $block->position = $blocks["position"];
                $block->content = json_decode($blocks["content"]);
                $block->blockable_id = $model->id;
                $block->save();
            }
        }
    }
}
