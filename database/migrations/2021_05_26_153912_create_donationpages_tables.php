<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonationPagesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donation_pages', function (Blueprint $table) {
            createDefaultTableFields($table);
            $table->string('title', 40)->nullable();
            $table->text('description')->nullable();
        });

        Schema::create('donation_page_revisions', function (Blueprint $table) {
            createDefaultRevisionsTableFields($table, 'donation_page');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donation_pages');
    }
}
