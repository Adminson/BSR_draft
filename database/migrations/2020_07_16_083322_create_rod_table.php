<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rods', function (Blueprint $table) {
            $table->bigincrements('id');
            $table->string('investor_id');
            $table->string('participant_code');
            $table->string('participant_branch_code');
            $table->string('participant_name');
            $table->string('cds_account_number');
            $table->string('investor_name');
            $table->text('address1');
            $table->text('address2');
            $table->string('town');
            $table->string('post_code');
            $table->string('state_code');
            $table->string('country_code');
            $table->string('nationality');
            $table->string('race');
            $table->string('investor_type');
            $table->string('telephone_number');
            $table->string('stock_code');
            $table->string('serial_number');
            $table->string('quantity_allotted');
            $table->string('status_code');
            $table->string('beneficiary_code');
            $table->string('account_qualifier');
            $table->string('allow_duplicate');
            $table->string('rejection_codes');
            $table->string('old_investor_id');
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
        Schema::dropIfExists('rods');
    }
}
