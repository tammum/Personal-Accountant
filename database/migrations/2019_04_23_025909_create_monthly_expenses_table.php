<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMonthlyExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthly_expenses', function (Blueprint $table) {
            $table->increments('monthly_expense_id');
            $table->integer('id');
            $table->date('date');
            $table->integer('house_rent')->nullable();
            $table->integer('electricity_bill')->nullable();
            $table->integer('balance_transfer')->nullable();
            $table->integer('repay_loan')->nullable();
            $table->integer('mobile_expense')->nullable();
            $table->integer('other_expense')->nullable();
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
        Schema::dropIfExists('monthly_expenses');
    }
}
