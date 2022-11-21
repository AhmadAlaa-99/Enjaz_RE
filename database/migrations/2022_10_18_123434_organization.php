<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class Organization extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organization', function (Blueprint $table)
         {
        $table->id();
        $table->string('company_name')->nullable()->default('-');
        $table->string('email')->references('email')->on('users')->cascadeOnDelete();
        $table->date('record_date')->nullable()->default(Carbon::now());
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
        //
    }
}
