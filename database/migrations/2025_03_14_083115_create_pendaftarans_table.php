<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('nisn', 10)->unique();
            $table->string('asal_sekolah');
            $table->enum('agama', ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu']);
            $table->decimal('jarak_tempat_tinggal', 5, 2);
            $table->string('no_telp');
            $table->enum('pilihan_ekskul', ['Pencak Silat', 'Hizbul Wathan', 'Futsal']);
            $table->text('alamat');
            $table->decimal('nilai_rata_rata_skl', 5, 2);

            // File upload kolom
            $table->string('scan_skl');
            $table->string('scan_akta');
            $table->string('scan_kk');
            $table->string('scan_piagam')->nullable();
            $table->string('scan_kip')->nullable();

            $table->string('status')->default('Diproses');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};