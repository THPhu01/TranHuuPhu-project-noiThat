<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTinTucTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tin_tuc', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_dm_tt');
            $table->text('tieu_de')->nullable();
            $table->text('tom_tat')->nullable();
            $table->text('noi_dung')->nullable();
            $table->decimal('views', 10, 0)->nullable();
            $table->text('anh')->nullable();
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
        Schema::dropIfExists('tin_tuc');
    }
}
