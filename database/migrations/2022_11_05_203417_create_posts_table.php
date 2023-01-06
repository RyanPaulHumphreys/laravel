<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('content', 255);
            $table->timestamps();

            $table->bigInteger('group_id')->references('id')->on('groups')
                ->onDelete('cascade')->onUpdate('cascade')->nullable();

            $table->bigInteger('image_id')->references('id')->on('images')
                ->onDelete('cascade')->onUpdate('cascade')->nullable();

            $table->bigInteger('user_id')->references('id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
