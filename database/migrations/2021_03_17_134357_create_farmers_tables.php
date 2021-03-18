<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFarmersTables extends Migration
{
    public function up()
    {
        Schema::create('farmers', function (Blueprint $table) {
            createDefaultTableFields($table);
            $table->foreignId('municipality_id')->nullable()->constrained();
            $table->string('name', 200)->nullable();
            $table->text('description')->nullable();
            $table->string('address')->nullable();
        });

        Schema::create('farmer_slugs', function (Blueprint $table) {
            createDefaultSlugsTableFields($table, 'farmer');
        });

        Schema::create('farmer_revisions', function (Blueprint $table) {
            createDefaultRevisionsTableFields($table, 'farmer');
        });
    }

    public function down()
    {
        Schema::dropIfExists('farmer_revisions');
        Schema::dropIfExists('farmer_slugs');
        Schema::dropIfExists('farmers');
    }
}
