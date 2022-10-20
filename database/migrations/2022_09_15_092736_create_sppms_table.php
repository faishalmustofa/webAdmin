<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSPPMSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sppms', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('id_pembuat')->nullable();
            $table->foreign('id_pembuat')->references('id')->on('users')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->string('no_project')->nullable();
            $table->string('no_spk')->nullable();
            $table->text('uraian')->nullable();
            $table->string('kode_material')->nullable();
            $table->string('spesifikasi')->nullable();
            $table->string('satuan',10)->nullable();
            $table->integer('qty_sppm')->nullable();
            $table->string('hpp')->nullable();
            $table->integer('qty_hpp')->nullable();
            $table->timestamp('target_kedatangan')->nullable();
            $table->string('file_teknis')->nullable();
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
        Schema::dropIfExists('sppms');
    }
}
