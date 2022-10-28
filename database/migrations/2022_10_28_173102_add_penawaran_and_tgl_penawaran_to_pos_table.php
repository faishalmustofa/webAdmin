<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPenawaranAndTglPenawaranToPosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pos', function (Blueprint $table) {
            $table->text('penawaran')->after('lokasi_penyerahan_barang')->nullable();
            $table->timestamp('tgl_penawaran')->after('penawaran')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pos', function (Blueprint $table) {
            $table->dropColumn('penawaran');
            $table->dropColumn('tgl_penawaran');
        });
    }
}
