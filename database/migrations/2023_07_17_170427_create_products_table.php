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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('pro_name', 255)->nullable();
            $table->string('pro_slug', 255)->unique();
            $table->integer('pro_price')->default(0);
            $table->integer('pro_price_entry')->default(0)->comment('Gía nhập');
            $table->integer('pro_category_id')->default(0);
            $table->integer('pro_admin_id')->default(0);
            $table->tinyInteger('pro_sale')->default(0);
            $table->string('pro_avatar', 255)->nullable();
            $table->integer('pro_view')->default(0);
            $table->tinyInteger('pro_hot')->default(0)->index();
            $table->tinyInteger('pro_active')->default(1)->index();
            $table->integer('pro_pay')->default(0);
            $table->mediumText('pro_description')->nullable();
            $table->string('pro_content')->nullable();
            $table->integer('pro_review_total')->default(0);
            $table->integer('pro_review_star')->default(0);
            $table->integer('pro_age_review')->default(0);
            $table->tinyInteger('pro_country')->default(0);
            $table->integer('pro_number')->default(0);
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
        Schema::dropIfExists('products');
    }
};
