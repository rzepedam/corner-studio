<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
             $table->unsignedInteger('country_id')->nullable();
            $table->unsignedInteger('marital_status_id')->nullable();
            $table->string('male_surname');
            $table->string('female_surname');
            $table->string('first_name');
            $table->string('second_name');
            $table->string('full_name');
            $table->string('rut')->unique();
            $table->date('birthday');
            $table->boolean('is_male');
            $table->string('email')->unique();
            $table->softDeletes();
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
        Schema::dropIfExists('clients');
    }
}
