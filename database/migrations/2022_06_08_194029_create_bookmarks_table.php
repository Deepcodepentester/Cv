<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateBookmarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookmarks', function (Blueprint $table) {
                    $table->bigInteger('id',false,true);
                    $table->bigInteger('post_id',false,true);
                    $table->bigInteger('user_id',false,true);
                    $table->timestamps();
                    $table->primary(['id','post_id','user_id']);
                    //$table->bigInteger('id',true,true)->change();
        });
        DB::statement("ALTER TABLE bookmarks change id id bigint(20) auto_increment");
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookmarks');
    }
}
