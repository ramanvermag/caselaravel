<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BaractChapters extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('baract_chapters', function($table){
            $table->increments('id');
            $table->integer('baract_id');
            $table->string('baract_title', 255);
            $table->string('title',255);
            $table->string('chapter_number',10);
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
        //
        Schema::dropIfExists('baract_chapters');
    }
}
