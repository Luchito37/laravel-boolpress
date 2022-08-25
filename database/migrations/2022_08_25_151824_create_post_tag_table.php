<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_tag', function (Blueprint $table) {
            $table->id();

            // creiamo ora la Foreign Kay di post e di tag perchè eseguiremo un relazione many to many

            // Foreign kay per i post
            $table->unsignedBigInteger("post_id")->nullable();
            $table->foreign("post_id")
                ->references("id")
                ->on("posts");

            // Foreign kay per i tag
            $table->unsignedBigInteger("tag_id")->nullable();
            $table->foreign("tag_id")
                ->references("id")
                ->on("tags");


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
        Schema::dropIfExists('post_tag');
    }
}
