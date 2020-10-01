<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswerhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answerhs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('examples_id')->default('0');
            $table->integer('user_id')->default('0');
            $table->string('code_gen')->nullable();
            $table->string('total_time')->nullable();
            $table->string('total_point')->nullable();
            $table->integer('status')->default('0');
            $table->integer('status2')->default('0');
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
        Schema::dropIfExists('answerhs');
    }
}
