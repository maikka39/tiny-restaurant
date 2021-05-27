<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Homepage;
use App\Models\HomepageLinkItem;

class HomepageSeeder extends MediaSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Homepage::create([
            'id' => 1,
            'title' => 'Tiny Restaurant',
            'slogan' => 'Welkom op onze website!',
            'button_text' => 'Projecten',
            'button_url' => '/projecten',
            'published' => true
        ]);

        HomepageLinkItem::create([
            'name' => 'Facebook',
            'url' => 'https://www.facebook.com/TinyRestaurant.nl/',
            'logo_url' => 'facebook.png',
            'pitch' => 'Sluit jezelf aan bij onze facebook pagina samen met talloze andere.',
            'position' => 1,
            'homepage_id' => 1
        ]);

        HomepageLinkItem::create([
            'name' => 'YouTube',
            'url' => 'https://www.youtube.com/channel/UCpBXOgGlZXXr8y8o-hAg9iw',
            'logo_url' => 'youtube.png',
            'position' => 1,
            'homepage_id' => 1
        ]);

        HomepageLinkItem::create([
            'name' => 'Google',
            'url' => 'https://google.nl/',
            'logo_url' => 'share.png',
            'position' => 3,
            'homepage_id' => 1
        ]);

        $this->seed_media(
            "App\Models\Homepage",
            1,
            "hero",
            "homepage_cover.jpg",
            "Homepage cover image",
        );
    }
}
