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
        Schema::create('slides', function (Blueprint $table) {
            $table->id();
            $table->string('sd_title', 255)->nullable();
            $table->string('sd_link', 255)->nullable();
            $table->string('sd_image', 255)->nullable();
            $table->tinyInteger('sd_target')->default(0);
            $table->tinyInteger('sd_active')->default(0);
            $table->tinyInteger('sd_sort')->default(0);
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
        Schema::dropIfExists('slides');
    }
};
