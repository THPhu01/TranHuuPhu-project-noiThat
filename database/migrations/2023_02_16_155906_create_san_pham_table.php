<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanPhamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('san_pham', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_loai_dm');
            $table->unsignedBigInteger('id_vl');
            $table->string('tenSP',255)->nullable();
            $table->text('anh')->nullable();
            $table->json('thumbnail')->nullable();
            $table->decimal('gia_goc',10,0)->nullable();
            $table->integer('so_luong')->nullable();
            $table->decimal('gia_khuyen_mai',10,0)->nullable();
            $table->tinyInteger('tinh_trang')->nullable();
            $table->text('mo_ta',255)->nullable();
            $table->string('kich_thuoc')->nullable();
            $table->tinyInteger('hot')->default(0);
            $table->integer('rate')->nullable();
            $table->integer('view')->nullable()->default(0);
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
        Schema::dropIfExists('san_pham');
    }
}
