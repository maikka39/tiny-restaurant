<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHomesTables extends Migration
{
    public function up()
    {
        Schema::create('homes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

    }

    public function down()
    {
        Schema::dropIfExists('home_revisions');
        Schema::dropIfExists('homes');
    }
}
