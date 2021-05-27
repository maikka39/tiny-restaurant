<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomepageLinks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homepage_link_item', function (Blueprint $table) {
            createDefaultTableFields($table);

            $table->text('name');
            $table->text('url');
            $table->text('logo_url');
            $table->text('pitch')->nullable();
            $table->integer('position')->unsigned()->nullable();
            $table->foreignId('homepage_id')->constrained()->on('homepages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('homepage_link_item');
    }
}
