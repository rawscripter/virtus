<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarketPropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('market_properties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('market_id');
            $table->foreign('market_id')->references('id')
                ->on('markets')->onDelete('cascade');
            $table->unsignedBigInteger('property_address_id');
            $table->foreign('property_address_id')->references('id')
                ->on('property_addresses')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('market_properties');
    }
}
