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
            $table->string('origin')->nullable();
            $table->string('character')->nullable();
            $table->string('goods_type')->nullable();
            $table->string('key_wprd')->nullable();
            $table->integer('condition');
                // 1:未開封 2:確認のため開封 3:その他
            $table->string('notes')->nullable();
            $table->integer('status')->default(1);
                // 1:交換相手は決まってない 2:決まった
            
            // 自分の求めているグッズの情報
            $table->string('want_pic_id')->nullable();
            $table->string('want_origin')->nullable();
            $table->string('want_character')->nullable();
            $table->string('want_goods_type')->nullable();
            $table->string('want_key_word')->nullable();
            $table->string('want_notes')->nullable();
            
            // 交換方法
            $table->boolean('mail_flag');
            $table->integer('ship_from')->nullable();
                //47都道府県を数字で管理
            $table->integer('days')->nullable();
                // 1:1~2日 2:3~4日 3:5~7日
            $table->boolean('handing_flag');
            $table->string('place',40)->nullable();
            
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
