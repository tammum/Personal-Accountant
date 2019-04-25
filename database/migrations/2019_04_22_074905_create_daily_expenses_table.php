<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDailyExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_expenses', function (Blueprint $table) {
            $table->increments('daily_expense_id');
            $table->integer('id');
            $table->date('date');
            $table->integer('morning_bus_fair')->nullable();
            $table->integer('morning_shopping')->nullable();
            $table->integer('evening_bus_fair')->nullable();
            $table->integer('evening_shopping')->nullable();
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
        Schema::dropIfExists('daily_expenses');
    }
}
