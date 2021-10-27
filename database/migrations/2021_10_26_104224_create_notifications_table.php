<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->integer('type');
                        //0:リクエストが通った（取引成立）→リンクはトーク 1:リクエスト却下→交換リクエスト詳細　2:リクエストもらった→リンクは承認可否　
            $table->unsignedBigInteger('proposition_id');
            $table->integer('status')->default(2);
                        //0：false:非表示　1:True:表示（既読）　２：表示（未読）　論理削除、既読か未読か、50件溜まったら削除
            $table->timestamps();
            
            // 外部キー制約
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifications');
    }
}
