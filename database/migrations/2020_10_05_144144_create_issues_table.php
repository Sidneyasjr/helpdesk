<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issues', function (Blueprint $table) {
            $table->id();
            $table->foreignId('costumer')->constrained('costumers');
            $table->foreignId('user')->nullable()->constrained('users');
            $table->foreignId('category')->constrained('categories');
            $table->foreignId('module')->constrained('modules');
            $table->foreignId('comment')->constrained('comments');
            $table->foreignId('type')->constrained('types_issues');
            $table->string('subject');
            $table->text('description');
            $table->string('files')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('issues');
    }
}
