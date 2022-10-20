<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNamaProjectColumnToSppmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sppms', function (Blueprint $table) {
            $table->string('nama_project')->after('nama_pembuat')->nullable();
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
            $table->dropColumn('nama_project');
        });
    }
}
