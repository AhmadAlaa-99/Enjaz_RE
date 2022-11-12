<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinancialStatementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {











        Schema::create('financial_statements', function (Blueprint $table) {
            $table->id();
            $table->date('st_rental_date');
            $table->string('annual_rent');
            $table->string('recurring_rent_payment');
            $table->string('num_rental_payments');
            $table->date('end_rental_date');
            $table->enum('payment_cycle',['monthly','annual','quarterly','midterm']);
            $table->string('Total');
            $table->string('payment_channels');
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
        Schema::dropIfExists('financial_statements');
    }
}
