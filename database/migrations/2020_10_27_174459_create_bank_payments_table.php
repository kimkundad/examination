<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order_id_c');
            $table->string('name_c');
            $table->string('email_c');
            $table->string('phone_c');
            $table->integer('bank');
            $table->double('money_c', 8, 2);
            $table->string('day_tran');
            $table->string('time_tran')->nullable();
            $table->string('image')->nullable();
            $table->string('re_mark')->nullable();
            $table->string('re_mark_admin')->nullable();
            $table->integer('c_status')->default('0');
            $table->integer('pay_admin')->default('0');
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
        Schema::dropIfExists('bank_payments');
    }
}
