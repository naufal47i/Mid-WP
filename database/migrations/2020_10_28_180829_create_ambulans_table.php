<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmbulansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ambulans', function (Blueprint $table) {
            $table->id('id_ambulan');
            $table->unsignedBigInteger('id_posko');
            $table->foreign('id_posko')->references('id_posko')->on('posko__kesehatans');
            $table->string('NoPol',10);
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ambulans');
    }
}
