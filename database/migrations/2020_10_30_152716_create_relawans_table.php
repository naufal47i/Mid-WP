<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelawansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relawans', function (Blueprint $table) {
            $table->id("id");
            $table->unsignedBigInteger('id_posko');
            $table->foreign('id_posko')->references('id_posko')->on('posko__kesehatans');
            $table->string("nama");
            $table->string("NIK");
            $table->string("TTL");
            $table->string("jenis_kelamin");
            $table->string("no_telp");
            $table->string("email");
            $table->string("photo");
            $table->string("status_relawan");
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
        Schema::dropIfExists('relawans');
    }
}
