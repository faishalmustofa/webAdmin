<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDSMSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dsms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_pemasok')->nullable();
            $table->string('supplier')->nullable();
            $table->string('nama_barang')->nullable();
            $table->string('alamat',250)->nullable();
            $table->string('pic')->nullable();
            $table->string('no_telp',20)->nullable();
            $table->string('no_kantor',20)->nullable();
            $table->string('email',50)->nullable();
            $table->string('file_prakualifikasi')->nullable();
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
        Schema::dropIfExists('dsms');
    }
}
