<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealtiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('realties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('owner_id')->constrained('owners')->cascadeOnDelete();
            $table->string('realty_name')->nullable();
             $table->string('quarter');
            $table->string('agency_name')->nullable('-');
            $table->string('shopsNo');
            $table->string('agency_mobile')->nullable('-');
            $table->string('size');
            $table->enum('type', ['villa', 'building']);
            $table->enum('use', ['family', 'individually']);
            $table->string('roles');
            $table->string('elevator');
            $table->string('parking');
            $table->string('advantages')->nullable('-');
            $table->string('units');
            $table->string('rents')->default('0');
            $table->string('tax_amount')->default('0');
            $table->string('total_proc')->default('0');
            $table->string('total_leases')->default('0');


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
        Schema::dropIfExists('realties');
    }
}
