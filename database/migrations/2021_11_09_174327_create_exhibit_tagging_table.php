<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExhibitTaggingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exhibit_tagging', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('exhibit_id');
            $table->unsignedBigInteger('tag_id');
            $table->timestamps();
            
            // 外部キー制約
            $table->foreign('exhibit_id')->references('id')->on('exhibits')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
            
            // exhibit_idとtag_idの組み合わせの重複を許さない
            $table->unique(['exhibit_id', 'tag_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exhibit_tagging');
    }
}
