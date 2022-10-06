<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKpisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kpis', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('no_po');
            $table->foreign('no_po')->references('id')->on('pos')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->string('supplier')->nullable();
            $table->integer('id_supplier');
            $table->integer('persen_ok_ng')->nullable();
            $table->integer('persen_ked')->nullable();
            $table->integer('persen_biaya')->nullable();
            $table->integer('persen_pelayanan')->nullable();
            $table->integer('persen_daya_saing')->nullable();
            $table->integer('persen_smt')->nullable();
            $table->string('dok_evaluasi')->nullable();
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
        Schema::dropIfExists('kpis');
    }
}
