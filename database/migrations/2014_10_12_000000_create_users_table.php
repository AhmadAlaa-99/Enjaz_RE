<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
              $table->bigInteger('nationalitie_id')->unsigned();
            $table->foreign('nationalitie_id')->references('id')->on('nationalities')->onDelete('cascade');

        
            $table->date('date_birth')->nullable();
            $table->string('ID_type');
            $table->string('ID_num');
            $table->string('phone');
            $table->string('telephone');
            $table->string('email');
            $table->timestamp('email_verified_at');
            $table->text('role_name');
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
