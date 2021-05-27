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
            $table->text('mollie_api_key')->nullable();
        });

        Schema::create('donation_page_revisions', function (Blueprint $table) {
            createDefaultRevisionsTableFields($table, 'donation_page');
        });

        Schema::create('donation_page_amounts', function (Blueprint $table) {
            createDefaultTableFields($table);

            $table->text('amount');
            $table->integer('position')->unsigned()->nullable();
            $table->foreignId('donation_page_id')->constrained()->on('donation_pages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donation_page_revisions');
        Schema::dropIfExists('donation_page_amounts');
        Schema::dropIfExists('donation_pages');
    }
}
