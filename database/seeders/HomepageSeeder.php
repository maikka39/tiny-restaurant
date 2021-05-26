<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Homepage;
use App\Models\HomepageLinkItem;

class HomepageSeeder extends Seeder
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
            'logo_url' => 'Facebook.png',
            'pitch' => 'Sluit jezelf aan bij onze facebook pagina samen met talloze andere.',
            'position' => 1,
            'homepage_id' => 1
        ]);

        HomepageLinkItem::create([
            'name' => 'YouTube',
            'url' => 'https://youtube.nl/',
            'logo_url' => 'Youtube.png',
            'position' => 1,
            'homepage_id' => 1
        ]);

        HomepageLinkItem::create([
            'name' => 'Google',
            'url' => 'https://google.nl/',
            'logo_url' => 'Share.png',
            'position' => 3,
            'homepage_id' => 1
        ]);
    }
}
