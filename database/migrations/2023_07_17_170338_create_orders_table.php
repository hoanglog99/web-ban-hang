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
        Schema::create('orders', function (Blueprint $table) {    
                $table->id();
                $table->unsignedBigInteger('od_transaction_id')->default(0);
                $table->unsignedBigInteger('od_product_id')->default(0);
                $table->integer('od_sale')->default(0);
                $table->tinyInteger('od_price')->default(0);
                $table->integer('od_qty')->default(0);
                $table->string('od_size', 255)->nullable();
                $table->string('od_color', 255)->nullable();
                $table->tinyInteger('od_gender')->nullable();
                $table->timestamps();
                $table->softDeletes();  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
