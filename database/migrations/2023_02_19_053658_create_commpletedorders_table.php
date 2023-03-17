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
        Schema::create('commpletedorders', function (Blueprint $table) {
            $table->id();
            $table->string('product_id');
            $table->string('total_price');
            $table->integer('qty');
            $table->string('user_id')->nullable();
            $table->string('username')->nullable();
            $table->string('order_status')->default('new');
            $table->string('message')->default('We hope you enjoyed our services, thank you!');
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
        Schema::dropIfExists('commpletedorders');
    }
};
