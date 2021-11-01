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
            $table->unsignedBigInteger('proposition_id')->nullable()->default(null);
            $table->unsignedBigInteger('exhibit_id')->nullable()->default(null);
            $table->integer('content_id');
                        //通知　0:リクエスト届いた　1:取引不成立 
            $table->integer('status')->default(2);
                        //0：false:非表示　1:True:表示（既読）　２：表示（未読）　論理削除、既読か未読か、50件溜まったら削除
            $table->timestamps();
            
            // 外部キー制約
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('proposition_id')->references('id')->on('propositions');
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
        Schema::dropIfExists('notifications');
    }
}
