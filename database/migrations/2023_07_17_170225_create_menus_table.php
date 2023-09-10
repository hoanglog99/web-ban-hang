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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('mn_name', 255);
            $table->string('mn_slug', 255)->unique();
            $table->string('mn_avatar', 255)->nullable();
            $table->string('mn_banner', 255)->nullable();
            $table->string('mn_description', 255)->nullable();
            $table->tinyInteger('mn_hot')->default(0);
            $table->tinyInteger('mn_status')->default(1);
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
        Schema::dropIfExists('menus');
    }
};
