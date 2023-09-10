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
        Schema::create('discount_code', function (Blueprint $table) {
            $table->id();
            $table->string('d_code', 255)->unique();
            $table->unsignedInteger('d_number_code')->default(0);
            $table->dateTime('d_date_start')->nullable();
            $table->dateTime('d_date_end')->nullable();
            $table->unsignedInteger('d_percentage')->default(0);
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
        Schema::dropIfExists('discount_code');
    }
};
