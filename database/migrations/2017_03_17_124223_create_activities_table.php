<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table)
        {
            $table->increments('id');
            $table->unsignedInteger('professional_id')->nullable();
            $table->string('name');
            $table->float('amount');
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();
        });

        Schema::create('activity_subscription', function (Blueprint $table)
        {
            $table->unsignedInteger('activity_id')->nullable();
            $table->unsignedInteger('subscription_id')->nullable();

            $table->primary(['activity_id', 'subscription_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activities');
        Schema::dropIfExists('activity_subscription');
    }
}
