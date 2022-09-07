<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->string('nama',250);
            $table->string('email')->unique()->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('alamat')->nullable();
            $table->string('nomor_telepon')->nullable();
            // $table->timestamp('email_verified_at')->nullable();
            $table->boolean('jenis_user');
            // $table->boolean('jenis_user')->default(0);
            $table->string('username')->unique();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}

// $user::create([
//     'nama'=>'B001',
//     'username'=>'admin',
//     'password'=>bcrypt('123'),
//     'jenis_user'=>'0'
// ]);

// $barang=new barang
// $jenis_barang = new jenis_barang

// $barang::create([
//     'jenis_barang_id'=>2,
//     'kode_barang'=>'BT01',
//     'nama_barang'=>'kompor1',
//     'harga_barang'=>'9000',
//     'stock'=>'4'
// ]);

// $jenis_barang::create([
//     'jenis_barang'=>'kompor',
// ]);