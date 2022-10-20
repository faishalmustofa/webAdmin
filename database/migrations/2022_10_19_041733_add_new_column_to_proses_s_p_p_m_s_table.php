<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumnToProsesSPPMSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('proses_s_p_p_m_s', function (Blueprint $table) {
            $table->timestamp('tgl_proses_1')->after('deskripsi')->nullable();
            $table->timestamp('tgl_proses_2')->after('tgl_proses_1')->nullable();
            $table->timestamp('tgl_proses_3')->after('tgl_proses_2')->nullable();
            $table->timestamp('tgl_proses_4')->after('tgl_proses_3')->nullable();
            $table->timestamp('tgl_proses_5')->after('tgl_proses_4')->nullable();
            $table->timestamp('tgl_proses_6')->after('tgl_proses_5')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('proses_s_p_p_m_s', function (Blueprint $table) {
            $table->dropColumn('tgl_proses_1');
            $table->dropColumn('tgl_proses_2');
            $table->dropColumn('tgl_proses_3');
            $table->dropColumn('tgl_proses_4');
            $table->dropColumn('tgl_proses_5');
            $table->dropColumn('tgl_proses_6');
        });
    }
}
