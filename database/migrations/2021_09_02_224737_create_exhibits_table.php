<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExhibitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exhibits', function (Blueprint $table) {
            
            // 自分の持っているグッズの情報
            $table->bigIncrements('id');
            $table->unsignedBigInteger('exhibitor_id');
            $table->string('pic_id')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('notes')->nullable();
            $table->integer('status')->default(1);
                // 1:交換相手は決まってない 2:決まった 3:削除済み
            
            // 交換方法
            $table->integer('mail_flag');
            $table->integer('handing_flag');
            $table->string('place')->nullable();
            
            $table->timestamps();
            
            // 外部キー制約
            $table->foreign('exhibitor_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exhibits');
    }
}
