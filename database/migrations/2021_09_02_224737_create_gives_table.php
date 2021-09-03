<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gives', function (Blueprint $table) {
            
            // 自分の持っているグッズの情報
            $table->bigIncrements('id');
            $table->unsignedBigInteger('exhibitor_id');
            $table->string('pic_id');
            $table->string('origin');
            $table->string('character');
            $table->string('goods_type');
            $table->string('goods_name');
            $table->enum('condition', ['Unopen', 'open','others']);
            $table->string('notes');
            $table->enum('status_flag', ['already', 'yet']);
            
            // 自分の求めているグッズの情報
            $table->string('want_pic_id');
            $table->string('want_origin');
            $table->string('want_character');
            $table->string('want_goods_type');
            $table->string('want_goods_name');
            $table->string('want_notes');
            
            // 交換方法
            $table->boolean('mail_flag');
            $table->string('ship_from',5);
            $table->enum('days', ['2', '4','7']);
            $table->boolean('handing_flag');
            $table->string('place',10);
            
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
        Schema::dropIfExists('gives');
    }
}
