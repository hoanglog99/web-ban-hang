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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('cmt_name', 255)->nullable();
            $table->string('cmt_email', 255)->nullable();
            $table->text('cmt_content')->nullable();
            $table->unsignedBigInteger('cmt_parent_id')->default(0)->index();
            $table->unsignedBigInteger('cmt_product_id')->default(0)->index();
            $table->unsignedBigInteger('cmt_admin_id')->default(0)->index();
            $table->unsignedBigInteger('cmt_user_id')->default(0)->index();
            $table->unsignedInteger('cmt_like')->default(0);
            $table->unsignedInteger('cmt_disk_like')->default(0);
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
        Schema::dropIfExists('comments');
    }
};
