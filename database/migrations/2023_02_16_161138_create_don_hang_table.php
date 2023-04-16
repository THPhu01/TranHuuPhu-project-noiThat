<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonHangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('don_hang', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user')->nullable();
            $table->unsignedBigInteger('id_coupon')->nullable();
            $table->decimal('tong',10,0)->default(0);
            $table->decimal('giam_gia',10,0)->default(0);
            $table->decimal('gia_goc',10,0)->default(0);
            $table->text('ghi_chu')->nullable();
            $table->string('coupon',255)->nullable();
            $table->tinyInteger('trang_thai')->default(0);
            $table->string('ho_va_ten',255);
            $table->string('phone',255)->nullable();
            $table->string('email',255)->nullable();
            $table->string('dia_chi',255)->nullable();
            $table->tinyInteger('payment_method')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('don_hang');
    }
}
