<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\DonationPage;
use Illuminate\Support\Facades\Schema;

class DonationPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DonationPage::create([
            'id' => 1,
            'title' => 'Steun het Tiny Restaurant',
            'description' => 'Steun samen met andere het Tiny Restaurant, zodat deze non-profit de boerensamenleving kan blijven helpen.',
            'published' => true,
        ]);

        $twillMediasTable = config('twill.medias_table', 'twill_medias');
        $twillMediablesTable = config('twill.mediables_table', 'twill_mediables');

        DB::table($twillMediasTable)->insert([
            'id' => 1,
            'uuid' => 'seeder/donate_cover.jpg',
            'filename' => 'donate_cover.jpg',
            'alt_text' => 'Donate cover image',
            'width' => 1600,
            'height' => 1200,
        ]);

        DB::table($twillMediablesTable)->insert([
            'mediable_id' => 1,
            'mediable_type' => 'App\Models\DonationPage',
            'media_id' => 1,
            'crop_x' => 0,
            'crop_y' => 112,
            'crop_w' => 1598,
            'crop_h' => 899,
            'role' => 'hero',
            'crop' => 'desktop',
            'ratio' => 'desktop',
            'metadatas' => '{"video": null, "altText": null, "caption": null}',
            'locale' => 'nl',
        ]);

        DB::table($twillMediablesTable)->insert([
            'mediable_id' => 1,
            'mediable_type' => 'App\Models\DonationPage',
            'media_id' => 1,
            'crop_x' => 0,
            'crop_y' => 0,
            'crop_w' => 1200,
            'crop_h' => 1200,
            'role' => 'hero',
            'crop' => 'mobile',
            'ratio' => 'mobile',
            'metadatas' => '{"video": null, "altText": null, "caption": null}',
            'locale' => 'nl',
        ]);

        DB::table($twillMediablesTable)->insert([
            'mediable_id' => 1,
            'mediable_type' => 'App\Models\DonationPage',
            'media_id' => 1,
            'crop_x' => 0,
            'crop_y' => 0,
            'crop_w' => 1598,
            'crop_h' => 1200,
            'role' => 'hero',
            'crop' => 'flexible',
            'ratio' => 'flexible',
            'metadatas' => '{"video": null, "altText": null, "caption": null}',
            'locale' => 'nl',
        ]);
 }
}
