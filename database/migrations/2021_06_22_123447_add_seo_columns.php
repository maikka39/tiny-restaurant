<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSeoColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        foreach (["donation_pages", "farmers", "homepages", "municipalities", "news_items", "pages", "projects"] as $column) {
            Schema::table($column, function (Blueprint $table) {
                $table->text('category')->nullable();
                $table->text('keywords')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
