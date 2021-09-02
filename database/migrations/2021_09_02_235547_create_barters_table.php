<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBartersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('give_id');
            $table->unsignedBigInteger('request_id');
            $table->enum('status', ['yet', 'alredy','cancel']);
            $table->date('timelimit');
            $table->timestamps();
            
            // 外部キー制約
            $table->foreign('give_id')->references('id')->on('gives');
            $table->foreign('request_id')->references('id')->on('requests');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barters');
    }
}
