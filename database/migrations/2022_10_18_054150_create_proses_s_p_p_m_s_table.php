<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProsesSPPMSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proses_s_p_p_m_s', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_sppm')->nullable();
            $table->foreign('id_sppm')->references('id')->on('sppms')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->tinyInteger('status')->nullable();
            $table->string('deskripsi')->nullable();
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
        Schema::dropIfExists('proses_s_p_p_m_s');
    }
}
