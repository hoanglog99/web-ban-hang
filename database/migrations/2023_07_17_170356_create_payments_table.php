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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('p_transaction_id')->nullable();
            $table->unsignedBigInteger('p_user_id')->nullable();
            $table->double('p_money', 8, 2)->comment('Số tiền thanh toán')->nullable();
            $table->string('p_note', 191)->comment('Nội dung thanh toán')->nullable();
            $table->string('p_transaction_code', 191);
            $table->string('p_vnp_response_code', 255)->comment('Mã phản hồi')->nullable();
            $table->string('p_code_vnpay', 255)->comment('Mã giao dịch VNPAY')->nullable();
            $table->string('p_code_bank', 255)->comment('Mã ngân hàng')->nullable();
            $table->dateTime('p_time')->nullable();
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
        Schema::dropIfExists('payments');
    }
};
