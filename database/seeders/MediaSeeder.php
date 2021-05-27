<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\DonationPage;
use App\Models\DonationPageAmount;
use Illuminate\Support\Facades\Schema;

class MediaSeeder extends Seeder
{
    public function seed_media($model, $filename, $alt_text, $width, $height, $desktop_crop, $mobile_crop, $flexible_crop)
    {
        $twillMediasTable = config('twill.medias_table', 'twill_medias');
        $twillMediablesTable = config('twill.mediables_table', 'twill_mediables');

        $id = DB::table($twillMediasTable)->max('id');

        $id = ($id == null) ? 1 : $id + 1;
        echo $id;

        DB::table($twillMediasTable)->insert([
            'id' => $id,
            'uuid' => 'seeder/'.$filename,
            'filename' => $filename,
            'alt_text' => $alt_text,
            'width' => $width,
            'height' => $height,
        ]);

        DB::table($twillMediablesTable)->insert([
            'mediable_id' => 1,
            'mediable_type' => $model,
            'media_id' => $id,
            'crop_x' => $desktop_crop[0],
            'crop_y' => $desktop_crop[1],
            'crop_w' => $desktop_crop[2],
            'crop_h' => $desktop_crop[3],
            'role' => 'hero',
            'crop' => 'desktop',
            'ratio' => 'desktop',
            'metadatas' => '{"video": null, "altText": null, "caption": null}',
            'locale' => 'nl',
        ]);

        DB::table($twillMediablesTable)->insert([
            'mediable_id' => 1,
            'mediable_type' => $model,
            'media_id' => $id,
            'crop_x' => $mobile_crop[0],
            'crop_y' => $mobile_crop[1],
            'crop_w' => $mobile_crop[2],
            'crop_h' => $mobile_crop[3],
            'role' => 'hero',
            'crop' => 'mobile',
            'ratio' => 'mobile',
            'metadatas' => '{"video": null, "altText": null, "caption": null}',
            'locale' => 'nl',
        ]);

        DB::table($twillMediablesTable)->insert([
            'mediable_id' => 1,
            'mediable_type' => $model,
            'media_id' => $id,
            'crop_x' => $flexible_crop[0],
            'crop_y' => $flexible_crop[1],
            'crop_w' => $flexible_crop[2],
            'crop_h' => $flexible_crop[3],
            'role' => 'hero',
            'crop' => 'flexible',
            'ratio' => 'flexible',
            'metadatas' => '{"video": null, "altText": null, "caption": null}',
            'locale' => 'nl',
        ]);
    }
}
