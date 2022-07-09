<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLapsCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laps_customer', function (Blueprint $table) {
            $table->id();
            $table->string('laps_cus_name');
            $table->string('laps_cus_address')->default(null);
            $table->integer('laps_cus_phone')->default(null);
            $table->string('laps_cus_mail')->default(null);
            $table->text('laps_cus_note')->default(null);
            $table->string('laps_cus_img')->default(null);
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
        Schema::dropIfExists('laps_customer');
    }
}
