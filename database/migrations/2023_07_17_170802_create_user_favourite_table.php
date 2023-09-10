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
        Schema::create('user_favourite', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('uf_product_id')->default(0);
            $table->unsignedBigInteger('uf_user_id')->default(0);
            $table->timestamps();
        });
    }

    /**  $table->integer('tst_user_id',11);
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_favourite');
    }
};
