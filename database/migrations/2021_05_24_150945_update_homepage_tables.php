<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateHomepageTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('homepages', function(Blueprint $table) {
            $table->renameColumn('banner', 'slogan');
            $table->string('button_text');
            $table->string('button_url');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('homepages', function(Blueprint $table) {
            $table->renameColumn('slogan', 'banner');
            $table->removeColumn('button_text');
            $table->removeColumn('button_url');
        });
    }
}
