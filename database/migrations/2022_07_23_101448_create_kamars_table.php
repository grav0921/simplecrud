<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKamarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kamars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sewa_kamar_id');
            $table->string('nomor_kamar');
            $table->string('harga_kamar');
            $table->string('status');
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
        Schema::dropIfExists('kamars');
    }
}

// $kamar = new kamar
// $kamar::create([
// 'sewa_kamar_id'=>3,
// 'nomor_kamar'=>'K003',
// 'harga_kamar'=>'20000',
// 'status'=>'tersedia'
// ])