<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomepagesTables extends Migration
{
    public function up()
    {
        Schema::create('homepages', function (Blueprint $table) {
            createDefaultTableFields($table);
            $table->string('title', 20)->nullable();
            $table->text('banner')->nullable();
            $table->text('highlight_link_name')->nullable();
            $table->text('highlight_link_url')->nullable();
            $table->text('highlight_link_logo_url')->nullable();
        });

        Schema::create('homepage_slugs', function (Blueprint $table) {
            createDefaultSlugsTableFields($table, 'homepage');
        });

        Schema::create('homepage_revisions', function (Blueprint $table) {
            createDefaultRevisionsTableFields($table, 'homepage');
        });
    }

    public function down()
    {
        Schema::dropIfExists('homepage_revisions');
        Schema::dropIfExists('homepage_slugs');
        Schema::dropIfExists('homepages');
    }
}
