<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('formulir_mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('status')->default('pending');
            $table->string('nama_lengkap');
            $table->string('alamat_ktp');
            $table->string('alamat_saat_ini')->nullable();
            $table->string('provinsi');
            $table->string('kota_kabupaten');
            $table->string('kecamatan');
            $table->string('telepon')->nullable(); // Max length 15 for phone numbers
            $table->string('hp'); // Assuming mobile phone is required
            $table->string('email')->unique();
            $table->string('kewarganegaraan');
            $table->date('tanggal_lahir');
            $table->string('provinsi_lahir');
            $table->string('kota_kabupaten_lahir');
            $table->string('tempat_lahir_luar_negeri')->nullable();
            $table->string('jenis_kelamin');
            $table->enum('status_menikah', ['Belum Menikah', 'Menikah', 'Lainnya'])->default('Belum Menikah');
            $table->string('agama');
            $table->timestamps();

            // Menambahkan foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formulir_mahasiswas');
    }
};
