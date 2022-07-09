<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLapsProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laps_product', function (Blueprint $table) {
            $table->id();
            $table->string('laps_pro_name');
            $table->integer('laps_pro_number')->default(null);
            $table->text('laps_pro_note')->default(null);
            $table->string('laps_img')->default(null);
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
        Schema::dropIfExists('laps_product');
    }
}
