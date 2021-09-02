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
            $table->string('prefecture',5);
            $table->enum('age', ['under18', 'over18','over20']);
            $table->boolean('age_public');
            $table->enum('gender', ['woman', 'man','others']);
            $table->boolean('age_public');
            $table->string('prefecture',5);
            $table->text('introduce');
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
            $table->dropColumn('prefecture');
            $table->dropColumn('age');
            $table->dropColumn('age_public');
            $table->dropColumn('gender');
            $table->dropColumn('age_public');
            $table->dropColumn('prefecture');
            $table->dropColumn('introduce');
        });
    }
}
