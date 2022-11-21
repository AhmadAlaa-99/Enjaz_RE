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
            $table->string('realty_name');
            $table->string('address');
            $table->string('size');
            $table->enum('type', ['villa', 'building']);
            $table->enum('use', ['family', 'individually']);
            $table->string('roles');
            $table->string('advantages');
            $table->string('units');
            $table->string('rents')->default('0');

            $table->foreignId('owner_id')->constrained('organization')->cascadeOnDelete();

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
