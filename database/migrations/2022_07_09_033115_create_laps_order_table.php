<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLapsOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laps_order', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('laps_id_cus');
            $table->string('laps_od_name')->default(null);
            $table->date('laps_od_date')->default(null);
            $table->unsignedBigInteger('laps_id_product');
            $table->integer('laps_od_number')->default(null);
            $table->text('laps_od_note')->default(null);
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
        Schema::dropIfExists('laps_order');
    }
}
