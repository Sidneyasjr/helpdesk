<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            /** perfil */
            $table->boolean('user')->nullable();
            $table->boolean('master')->nullable();

            /** data */
            $table->string('genre')->nullable();
            $table->string('document')->unique();
            $table->date('date_of_birth')->nullable();
            $table->string('cover')->nullable();

            /** address */
            $table->string('zipcode')->nullable();
            $table->string('street')->nullable();
            $table->string('number')->nullable();
            $table->string('complement')->nullable();
            $table->string('neighborhood')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();

            /** contact */
            $table->string('telephone')->nullable();
            $table->string('cell')->nullable();

            /** access */
            $table->boolean('admin')->nullable();
            $table->boolean('client')->nullable();
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
            /** perfil */
            $table->dropColumn('user');
            $table->dropColumn('master');

            /** data */
            $table->dropColumn('genre');
            $table->dropColumn('document');
            $table->dropColumn('date_of_birth');
            $table->dropColumn('cover');

            /** address */
            $table->dropColumn('zipcode');
            $table->dropColumn('street');
            $table->dropColumn('number');
            $table->dropColumn('complement');
            $table->dropColumn('neighborhood');
            $table->dropColumn('state');
            $table->dropColumn('city');

            /** contact */
            $table->dropColumn('telephone');
            $table->dropColumn('cell');

            /** access */
            $table->dropColumn('admin');
            $table->dropColumn('client');
        });
    }
}
