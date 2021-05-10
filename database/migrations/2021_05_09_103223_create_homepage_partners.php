<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomepagePartners extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homepage_partner_item', function (Blueprint $table) {
            createDefaultTableFields($table);

            $table->text('name')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('homepage_partner_item');
    }
}
