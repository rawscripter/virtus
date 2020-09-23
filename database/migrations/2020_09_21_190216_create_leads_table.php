<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('owner_id')->nullable();;
            $table->char('first_name');
            $table->char('last_name')->nullable();
            $table->char('email')->nullable();
            $table->char('best_phone_number');
            $table->bigInteger('communication_type_id');
            $table->char('other_owners_info')->nullable();
            $table->char('property_address');
            $table->char('property_city');
            $table->char('property_state');
            $table->char('property_zip')->nullable();
            $table->string('property_site_link')->nullable();
            $table->bigInteger('lead_status_id');
            $table->text('lead_status_notes')->nullable();
            $table->bigInteger('contact_stage_id');
            $table->bigInteger('lead_temperature_id');
            $table->bigInteger('follow_up_type_id');
            $table->dateTime('follow_up_date')->nullable();
            $table->bigInteger('occupancy_id');
            $table->longText('occupancy_details')->nullable();;
            $table->longText('property_details')->nullable();
            $table->string('reason_to_sell')->nullable();
            $table->string('mortgage_amount')->nullable();
            $table->string('HOA')->nullable();
            $table->string('asking_price')->nullable();
            $table->bigInteger('offer_made_id');
            $table->string('offer_amount')->nullable();
            $table->bigInteger('offer_accepted_id');
            $table->string('accepted_offer')->nullable();
            $table->bigInteger('lead_manager_id')->nullable();;
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
        Schema::dropIfExists('leads');
    }
}
