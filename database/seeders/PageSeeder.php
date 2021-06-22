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
        $pages = [[
            'title' => 'Privacy',
            'slug' => 'privacy',
            'description' => 'Lees hier onze Privacy Policy',
            'published' => true,
            'blocks' => [[
              'type' => 'text',
              'blockable_type' => 'App\\Models\\Page',
              'position' => 1,
              'content' => '{"html": "<p>Vul hier de privacy policy in.</p>"}',
            ]],
            'keywords' => 'privacy data',
        ], [
            'title' => 'Algemene voorwaarden',
            'slug' => 'algemene-voorwaarden',
            'description' => 'Lees hier onze Algemene Voorwaarden',
            'published' => true,
            'blocks' => [[
              'type' => 'text',
              'blockable_type' => 'App\\Models\\Page',
              'position' => 1,
              'content' => '{"html": "<p>Vul hier de algemene voorwaarden in.</p>"}',
            ]],
            'keywords' => 'voorwaarden algemeen',
        ]];

        foreach ($pages as $page) {
            $model = Page::create([
                'title' => $page['title'],
                'description' => $page['description'],
                'published' => $page['published'],
                'keywords' => 'pagina ' . $page['keywords'],
            ]);

            PageSlug::create([
                'slug' => Str::slug($page['slug']),
                'locale' => 'en',
                'active' => true,
                'page_id' => $model->id,
            ]);

            if (array_key_exists('blocks', $page)) {
                foreach ($page['blocks'] as $blocks) {
                    Block::create([
                        'type' => $blocks['type'],
                        'blockable_type' => $blocks['blockable_type'],
                        'position' => $blocks['position'],
                        'content' => json_decode($blocks['content']),
                        'blockable_id' => $model->id,
                    ]);
                }
            }
        }
    }
}
