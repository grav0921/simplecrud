<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSewaKamarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sewa_kamars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('kamar_id');
            $table->string('nomor_kamar');
            $table->string('check_in');
            $table->string('check_out');
            $table->string('harga');
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
        Schema::dropIfExists('sewa_kamars');
    }
}
