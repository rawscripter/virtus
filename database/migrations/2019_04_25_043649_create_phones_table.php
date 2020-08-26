<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('phone1')->nullable();
            $table->string('phone1_type')->nullable();
            $table->string('phone2')->nullable();
            $table->string('phone2_type')->nullable();
            $table->string('phone3')->nullable();
            $table->string('phone3_type')->nullable();
            $table->string('phone4')->nullable();
            $table->string('phone4_type')->nullable();
            $table->string('phone5')->nullable();
            $table->string('phone5_type')->nullable();
            $table->string('phone6')->nullable();
            $table->string('phone6_type')->nullable();
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
        Schema::dropIfExists('phones');
    }
}
