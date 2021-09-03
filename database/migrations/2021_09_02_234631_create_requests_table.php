<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('requester_id');
            $table->unsignedBigInteger('give_id');
            $table->string('pic_id');
            $table->boolean('mail_flag');
            $table->string('ship_from',5);
            $table->enum('days', ['2', '4','7']);
            $table->boolean('handing_flag');
            $table->string('place',10);
            $table->enum('condition', ['Unopen', 'open','others']);
            $table->string('notes');
            $table->enum('status', ['accept', 'reject','hold']);
            $table->timestamps();
            
            // 外部キー制約
            $table->foreign('requester_id')->references('id')->on('users');
            $table->foreign('give_id')->references('id')->on('gives');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requests');
    }
}
