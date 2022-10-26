<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('siswa_id')->unsigned();
            $table->foreign('siswa_id')->references('id')->on('siswa')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->string('nama_projek');
            $table->date('tanggal');
            $table->text('deskripsi');
            $table->char('foto');
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
        Schema::dropIfExists('project');
    }
};
