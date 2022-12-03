<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('realty_id')->constrained('realties')->cascadeOnDelete();
            $table->string('contactNo');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('rent_value');
            $table->string('contract_file');
            $table->enum('status',['جديد','مجدد'])->default('جديد');
            $table->enum('type',['سكني','تجاري']);
            $table->enum('type_s',['جاري','منتهي'])->default('جاري');
            $table->string('ejar_cost');
             $table->string('tax_amount')->default('0');;
            $table->string('tax')->default('0');
            $table->string('note');
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
        Schema::dropIfExists('contracts');
    }
};
