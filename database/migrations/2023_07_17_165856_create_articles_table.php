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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('a_name', 255);
            $table->string('a_slug', 255)->index();
            $table->tinyInteger('a_hot')->default(0)->index();
            $table->tinyInteger('a_active')->default(1)->index();
            $table->unsignedBigInteger('a_menu_id')->default(0)->index();
            $table->unsignedInteger('a_view')->default(0);
            $table->mediumText('a_description')->nullable();
            $table->string('a_avatar', 255)->nullable();
            $table->text('a_content')->nullable();
            $table->tinyInteger('a_position_1')->default(0);
            $table->tinyInteger('a_position_2')->default(0);
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
        Schema::dropIfExists('articles');
    }
};
