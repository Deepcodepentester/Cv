<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('replies', function (Blueprint $table) {
            $table->increments("id");
            $table->bigInteger("user_id")->unsigned();
            $table->bigInteger("post_id")->unsigned();
            $table->text("reply");
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign("post_id")->references("id")->on('posts')->onDelete('cascade');


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
        Schema::dropIfExists('replies');
    }
}
