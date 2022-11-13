<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->foreignId('realty_id')->constrained('realties')->cascadeOnDelete();
            $table->enum('type', ['villa', 'apartment','two-floor','small','annexe']);
            $table->string('number')->unique();
            $table->string('size');
            $table->string('details');
            $table->enum('furnished_mode', ['unfurnished', 'newfn','usedfn']);
            $table->enum('kitchen_Cabinets',['yes','no']);
            $table->integer('condition_units');
            $table->integer('role_number');
            $table->integer('bathrooms');
            $table->string('condition_type');
            $table->string('Elecrtricity_number');
            $table->string('water_number');
            $table->string('maint_cost')->default('0');
            $table->enum('status', ['rented', 'empty'])->default('empty');
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
        Schema::dropIfExists('units');
    }
}
