<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlugPlaySubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plug_play_subscriptions', function (Blueprint $table) {

            $table->id();

            $table->string('email');

            $table->string('name');

            $table->string('phone');

            $table->string('store_name');

            $table->longText('store_desc');

            $table->string('store_address');

            $table->string('store_logo');

            $table->string('subscription_name');

            $table->string('amount');


            $table->string('tranx')->nullable();

            $table->string('start_date');

            $table->string('end_date');


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
        Schema::dropIfExists('plug_play_subscriptions');
    }
}
