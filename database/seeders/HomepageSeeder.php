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
            'title' => 'TinyRestaurant',
            'banner' => 'Welkom op de officiële pagina van TinyRestaurant!',
            'highlight_link_name' => 'Facebook',
            'highlight_link_url' => 'https://www.facebook.com/TinyRestaurant.nl/',
            'highlight_link_logo_url' => 'Facebook.png',
            'published' => true
        ]);

        HomepageLinkItem::create([
            'name' => 'YouTube',
            'url' => 'https://youtube.nl/',
            'logo_url' => 'Youtube.png',
            'homepage_id' => 1
        ]);

        HomepageLinkItem::create([
            'name' => 'Google',
            'url' => 'https://google.nl/',
            'logo_url' => 'Share.png',
            'homepage_id' => 1
        ]);
    }
}
