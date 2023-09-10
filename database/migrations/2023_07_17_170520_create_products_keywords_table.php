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
        Schema::create('products_keywords', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pk_product_id')->default(0);
            $table->unsignedBigInteger('pk_keyword_id')->default(0);
            $table->timestamps();

            $table->index('pk_product_id');
            $table->index('pk_keyword_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products_keywords');
    }
};
