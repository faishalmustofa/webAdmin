<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNamaPembuatColumnToSppmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sppms', function (Blueprint $table) {
            $table->string('nama_pembuat')->after('id_pembuat')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sppms', function (Blueprint $table) {
            $table->dropColumn('nama_pembuat');
        });
    }
}
