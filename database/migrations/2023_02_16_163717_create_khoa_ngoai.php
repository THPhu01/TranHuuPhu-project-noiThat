<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKhoaNgoai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('loai_danh_muc', function (Blueprint $table) {
            $table->foreign('id_dm')->references('id')->on('danh_muc')->cascadeOnDelete();
        });
        Schema::table('san_pham', function (Blueprint $table) {
            $table->foreign('id_loai_dm')->references('id')->on('loai_danh_muc')->cascadeOnDelete();
            $table->foreign('id_vl')->references('id')->on('vat_lieu')->cascadeOnDelete();
        });
        Schema::table('don_hang', function (Blueprint $table) {
            $table->foreign('id_user')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('id_coupon')->references('id')->on('coupon')->cascadeOnDelete();
        });
        Schema::table('chi_tiet_don_hang', function (Blueprint $table) {
            $table->foreign('id_dh')->references('id')->on('don_hang')->cascadeOnDelete();
            $table->foreign('id_sp')->references('id')->on('san_pham')->cascadeOnDelete();
        });
        Schema::table('tin_tuc', function (Blueprint $table) {
            $table->foreign('id_dm_tt')->references('id')->on('danhmuc_tintuc')->cascadeOnDelete();
        });
        Schema::table('binh_luan', function (Blueprint $table) {
            $table->foreign('id_user')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('id_san_pham')->references('id')->on('san_pham')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('loai_danh_muc', function (Blueprint $table) {
            $table->dropForeign(['id_dm']);
        });
        Schema::table('san_pham', function (Blueprint $table) {
            $table->dropForeign(['id_loai_dm']);
            $table->dropForeign(['id_vl']);
        });
        Schema::table('don_hang', function (Blueprint $table) {
            $table->dropForeign(['id_user']);
            $table->dropForeign(['id_coupon']);
        });
        Schema::table('chi_tiet_don_hang', function (Blueprint $table) {
            $table->dropForeign(['id_dh']);
            $table->dropForeign(['id_sp']);
        });
        Schema::table('tin_tuc', function (Blueprint $table) {
            $table->dropForeign(['id_dm_tt']);
        });
        Schema::table('binh_luan', function (Blueprint $table) {
            $table->dropForeign(['id_user']);
            $table->dropForeign(['id_san_pham']);
        });
    }
}
