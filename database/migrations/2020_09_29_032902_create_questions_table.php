<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('qu_name')->nullable();
            $table->string('qu_file')->nullable();
            $table->integer('qu_type')->default('0');
            $table->string('ex_image')->nullable();
            $table->integer('cat_id')->default('0');
            $table->integer('part_id')->default('0');
            $table->integer('point')->default('1');
            $table->integer('qu_sort')->default('1');
            $table->integer('status')->default('0');
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
        Schema::dropIfExists('questions');
    }
}
