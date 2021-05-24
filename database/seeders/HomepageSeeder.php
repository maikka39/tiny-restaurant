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
            'published' => true
        ]);

        HomepageLinkItem::create([
            'name' => 'Facebook',
            'url' => 'https://www.facebook.com/TinyRestaurant.nl/',
            'logo_url' => 'Facebook.png',
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
