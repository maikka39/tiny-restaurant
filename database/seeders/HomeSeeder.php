<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Home;
use App\Models\HomeSetting;
use App\Models\Link;

class HomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $homes = array([
            'name' => 'v1.0',
            'published' => true
        ]);

        $settings = array([
            'key' => 'banner_title',
            'value' => 'TinyRestaurant'
        ],[
            'key' => 'banner_description',
            'value' => 'Welkom op de officiele pagina van TinyRestaurant!'
        ]);

        $links = array([
            'name' => 'Google',
            'url' => 'https://www.google.nl',
        ],[
            'name' => 'YouTube',
            'url' => 'https://www.youtube.com' 
        ]);

        foreach ($homes as $home) {
            $model = Home::create($home);

            foreach($settings as $setting) {
                $setting = HomeSetting::create([
                    'home_id' => $model->id,
                    'key' => $setting['key'],
                    'value' => $setting['value'],
                ]);
                $model->settings()->save($setting);
            }

            foreach($links as $link) {
                $link = Link::create($link);
                $model->links()->save($link);
            }
        }
    }
}
