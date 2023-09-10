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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tst_user_id')->index();
            $table->integer('tst_total_money');
            $table->string('tst_name', 255)->nullable();
            $table->string('tst_email', 255)->nullable();
            $table->string('tst_phone', 255)->nullable();
            $table->string('tst_address', 255)->nullable();
            $table->string('tst_note', 255)->nullable();
            $table->tinyInteger('tst_status')->default(1);
            $table->tinyInteger('tst_type')->default(1)->comment('1: Thanh toán thường || 2: Thanh toán Online');
            $table->text('tst_codee')->nullable();
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
        Schema::dropIfExists('transactions');
    }
};
