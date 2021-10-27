<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propositions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('exhibit_id');
            $table->string('pic_id')->nullable();
            $table->string('thumbnail')->nullable();
            $table->integer('mail_flag')->nullable();
            $table->integer('ship_from')->nullable();
                //47都道府県を数字で管理
            $table->integer('days')->nullable();
                // 1:1~2日 2:3~4日 3:5~7日
            $table->integer('handing_flag')->nullable();
            $table->string('place')->nullable();
            $table->integer('condition');
                // 1:未開封 2:確認のため開封 3:その他
            $table->string('notes')->nullable();
            $table->integer('status')->default(1);
                // 1:保留中 2:交換中 3:拒否 4:終了 5:キャンセル済み
                $table->date('deadline')->nullable();
            $table->timestamps();
            
            // 外部キー制約
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('exhibit_id')->references('id')->on('exhibits');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('propositions');
    }
}
