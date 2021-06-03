<?php

namespace Database\Seeders;

use App\Models\Homepage;
use App\Models\HomepageLinkItem;
use App\Models\HomepagePartnerItem;

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
            'published' => true,
        ]);

        HomepageLinkItem::create([
            'name' => 'Facebook',
            'url' => 'https://www.facebook.com/TinyRestaurant.nl/',
            'logo_url' => 'facebook.png',
            'pitch' => 'Sluit jezelf aan bij onze facebook pagina samen met talloze andere.',
            'position' => 1,
            'homepage_id' => 1,
        ]);

        HomepageLinkItem::create([
            'name' => 'YouTube',
            'url' => 'https://www.youtube.com/channel/UCpBXOgGlZXXr8y8o-hAg9iw',
            'logo_url' => 'youtube.png',
            'position' => 1,
            'homepage_id' => 1,
        ]);

        HomepageLinkItem::create([
            'name' => 'Google',
            'url' => 'https://google.nl/',
            'logo_url' => 'share.png',
            'position' => 3,
            'homepage_id' => 1,
        ]);

        $partners = [[
            'name' => 'Laarakker Bio',
            'description' => '<p>Laarakker BIO, onderdeel van de Laarakker bedrijven groep, richt zich volledig op de teelt, verwerking en in-/verkoop van een breed pakket biologische en biologisch dynamische groenten.</p>',
        ], [
            'name' => 'Rabobank',
            'description' => '<p>Rabo Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed ac nunc nec libero fringilla ornare. Aenean tortor ipsum, porttitor sed libero in, condimentum cursus arcu. In hac habitasse platea dictumst. Donec rutrum commodo tortor sit amet elementum. Phasellus tempus est a risus aliquam gravida. Morbi libero lectus, auctor id elit sollicitudin, dapibus mollis diam. Nam pellentesque suscipit nibh id efficitur.</p>',
        ], [
            'name' => 'Eigezwijns',
            'description' => '<p>Eigezwijns Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed ac nunc nec libero fringilla ornare. Aenean tortor ipsum, porttitor sed libero in, condimentum cursus arcu. In hac habitasse platea dictumst. Donec rutrum commodo tortor sit amet elementum. Phasellus tempus est a risus aliquam gravida. Morbi libero lectus, auctor id elit sollicitudin, dapibus mollis diam. Nam pellentesque suscipit nibh id efficitur.</p>',
        ], [
            'name' => 'EuroToques',
            'description' => '<p>Eurotoques Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed ac nunc nec libero fringilla ornare. Aenean tortor ipsum, porttitor sed libero in, condimentum cursus arcu. In hac habitasse platea dictumst. Donec rutrum commodo tortor sit amet elementum. Phasellus tempus est a risus aliquam gravida. Morbi libero lectus, auctor id elit sollicitudin, dapibus mollis diam. Nam pellentesque suscipit nibh id efficitur.</p>',
        ], [
            'name' => 'Regio Noordoost Brabant',
            'description' => '<p>RNOB Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed ac nunc nec libero fringilla ornare. Aenean tortor ipsum, porttitor sed libero in, condimentum cursus arcu. In hac habitasse platea dictumst. Donec rutrum commodo tortor sit amet elementum. Phasellus tempus est a risus aliquam gravida. Morbi libero lectus, auctor id elit sollicitudin, dapibus mollis diam. Nam pellentesque suscipit nibh id efficitur.</p>',
        ]];

        foreach ($partners as $partner) {
            $model = HomepagePartnerItem::create([
                'name' => $partner['name'],
                'description' => $partner['description'],
                'homepage_id' => 1,
            ]);

            $this->seed_media(
                "App\Models\HomepagePartnerItem",
                $model->id,
                'image',
                preg_replace('/[^a-z]/', '_', strtolower($model->name)) . '.png',
                'Logo van ' . $model->name,
            );
        }

        $this->seed_media(
            "App\Models\Homepage",
            1,
            'hero',
            'homepage_cover.jpg',
            'Homepage cover image',
        );
    }
}
