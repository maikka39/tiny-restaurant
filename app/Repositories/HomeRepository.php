<?php

namespace App\Repositories;

use App\Models\Home;
use App\Models\HomeSetting;
use App\Models\Link;
use Illuminate\Config\Repository;

class HomeRepository extends Repository
{
    public function __construct()
    {
    }

    public function updateSetting($key, $value) {
        $title = HomeSetting::where('key', $key)->first();
        $title->value = $value;
        $title->save();
    }

    public function saveLinks($links) {
        $homepage = Home::find(1);
        $homepage->links()->detach();

        if($links == null) {return;} 
        
        foreach($links as $reqLink) {
            $newLink = Link::where('name', $reqLink['name'])->where('url', $reqLink['url'])->first();

            if($newLink == null) {
                $newLink = new Link();
                $newLink->name = $reqLink['name'];
                $newLink->url = $reqLink['url'];
                $newLink->save();
            }

            $homepage->links()->attach($newLink->id);
        }
    }

    
}
