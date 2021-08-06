<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonsUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons_users', function (Blueprint $table) {
            $table->unsignedInteger('lesson_id');
            $table->unsignedBigInteger('used_id');
            $table->integer('learned')->default(0);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('lesson_id')->references('id')->on('lessons');
            $table->foreign('used_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lessons_users');
    }
}
