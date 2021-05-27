<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\DonationPage;
use App\Models\DonationPageAmount;
use Illuminate\Support\Facades\Schema;

class MediaSeeder extends Seeder
{
    public function seed_media($model, $model_id, $role, $filename, $alt_text)
    {
        $twillMediasTable = config('twill.medias_table', 'twill_medias');
        $twillMediablesTable = config('twill.mediables_table', 'twill_mediables');

        $id = DB::table($twillMediasTable)->max('id');

        $id = ($id == null) ? 1 : $id + 1;

        list($width, $height) = getimagesize("storage/app/public/uploads/seeder/".$filename);
        $smallest_wh = min($width, $height);

        DB::table($twillMediasTable)->insert([
            'id' => $id,
            'uuid' => 'seeder/'.$filename,
            'filename' => $filename,
            'alt_text' => $alt_text,
            'width' => $width,
            'height' => $height,
        ]);

        if ($width / $height >= 16/9) {
            $width16x9 = $height * (16/9);
            $height16x9 = $height;
        } else {
            $height16x9 = $width * (9/16);
            $width16x9 = $width;
        }

        echo $width." x ".$height." -> ".$width16x9." x ".$height16x9."\n";

        DB::table($twillMediablesTable)->insert([
            'mediable_id' => $model_id,
            'mediable_type' => $model,
            'media_id' => $id,
            'crop_x' => ($width - $width16x9) / 2,
            'crop_y' => ($height - $height16x9) / 2,
            'crop_w' => $width16x9,
            'crop_h' => $height16x9,
            'role' => $role,
            'crop' => 'desktop',
            'ratio' => 'desktop',
            'metadatas' => '{"video": null, "altText": null, "caption": null}',
            'locale' => 'nl',
        ]);

        DB::table($twillMediablesTable)->insert([
            'mediable_id' => $model_id,
            'mediable_type' => $model,
            'media_id' => $id,
            'crop_x' => ($width - $smallest_wh) / 2,
            'crop_y' => ($height - $smallest_wh) / 2,
            'crop_w' => $smallest_wh,
            'crop_h' => $smallest_wh,
            'role' => $role,
            'crop' => 'mobile',
            'ratio' => 'mobile',
            'metadatas' => '{"video": null, "altText": null, "caption": null}',
            'locale' => 'nl',
        ]);

        DB::table($twillMediablesTable)->insert([
            'mediable_id' => $model_id,
            'mediable_type' => $model,
            'media_id' => $id,
            'crop_x' => 0,
            'crop_y' => 0,
            'crop_w' => $width,
            'crop_h' => $height,
            'role' => $role,
            'crop' => 'flexible',
            'ratio' => 'flexible',
            'metadatas' => '{"video": null, "altText": null, "caption": null}',
            'locale' => 'nl',
        ]);
    }
}
