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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('e_name', 255)->nullable();
            $table->string('e_banner', 255)->nullable();
            $table->string('e_link', 255)->nullable();
            $table->tinyInteger('e_position_1')->default(0);
            $table->tinyInteger('e_position_2')->default(0);
            $table->tinyInteger('e_position_3')->default(0);
            $table->tinyInteger('e_position_4')->default(0);
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
        Schema::dropIfExists('events');
    }
};
