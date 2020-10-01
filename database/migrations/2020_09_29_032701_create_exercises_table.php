<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExercisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exercises', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ex_name')->nullable();
            $table->text('ex_detail')->nullable();
            $table->string('ex_image')->nullable();
            $table->integer('cat_id')->default('0');
            $table->integer('part_id')->default('0');
            $table->integer('ex_view')->default('0');
            $table->integer('ex_total')->default('0');
            $table->string('ex_time')->nullable();
            $table->string('ex_code')->nullable();
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
        Schema::dropIfExists('exercises');
    }
}
