<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExtraColumnToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('icon_id')->nullable();
                //iconをidで指定
            $table->integer('prefecture')->nullable();
                //47都道府県を数字で管理
            $table->integer('age')->nullable();
                // 1:18歳未満 2:18歳以上 3:20歳以上 3:非公開
            $table->integer('gender')->nullable();
                // 1:女性 2:男性 3:その他 3:非公開
            $table->text('introduce')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('icon_id');
            $table->dropColumn('prefecture');
            $table->dropColumn('age');
            $table->dropColumn('gender');
            $table->dropColumn('introduce');
        });
    }
}
