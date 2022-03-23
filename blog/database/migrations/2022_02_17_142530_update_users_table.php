<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('first_name', 50)->nullable();
            $table->string('last_name', 50)->nullable();
            $table->string('phone_number', 20)->nullable();
            $table->boolean('active')->default(1);
            $table->boolean('gender')->default(0);
            $table->date('birth_day')->nullable();
            $table->string('address')->nullable();
            $table->boolean('membership')->default(0);
            $table->string('url_avatar')->nullable();
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
            $table->dropColumn('first_name');
            $table->dropColumn('last_name');
            $table->dropColumn('phone_number');
            $table->dropColumn('active');
            $table->dropColumn('gender');
            $table->dropColumn('birth_day');
            $table->dropColumn('address');
            $table->dropColumn('membership');
            $table->dropColumn('url_avatar');
        });
    }
}
