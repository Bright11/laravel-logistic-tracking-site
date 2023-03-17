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
        Schema::create('shippings', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('email');
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->longText('address')->nullable();
            $table->string('number')->nullable();
            $table->string('nearest_city')->nullable();
            $table->string('status')->nullable();
            $table->string('username')->nullable();
            $table->longText('currnet_state')->nullable();
            $table->string('tracking_code')->nullable();
            $table->longText('message')->nullable();


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
        Schema::dropIfExists('shippings');
    }
};
