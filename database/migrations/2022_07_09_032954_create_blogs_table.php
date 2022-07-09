<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('title_slug');
            $table->text('intro');
            $table->longText('content');
            $table->string('thumbnail')->default('no-image.png');
            $table->integer('views_count')->default(0);
            $table->string('tags')->nullable();
            $table->integer('status')->default(1);
            $table->unsignedBigInteger('id_cate');
            $table->foreign('id_cate')->references('id')->on('blogs_category');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');
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
        Schema::dropIfExists('blogs');
    }
}
