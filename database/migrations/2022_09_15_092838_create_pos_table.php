<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePOSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('supplier')->nullable();
            $table->integer('id_supplier')->nullable();
            $table->string('hri')->nullable();
            $table->integer('qty_hri')->nullable();
            $table->tinyInteger('efisiensi')->nullable();
            $table->string('metode_pembayaran')->nullable();
            $table->timestamp('tempo_pembayaran')->nullable();
            $table->string('metode_penyerahan_barang')->nullable();
            $table->string('lokasi_penyerahan_barang')->nullable();
            $table->string('dokumen_kontrak')->nullable();
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
        Schema::dropIfExists('pos');
    }
}
