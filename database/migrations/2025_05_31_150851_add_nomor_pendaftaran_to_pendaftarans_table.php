<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('pendaftarans', function (Blueprint $table) {
            // Tambah kolom nomor_pendaftaran setelah kolom id, nullable
            $table->string('nomor_pendaftaran')->nullable()->after('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pendaftarans', function (Blueprint $table) {
            // Hapus kolom nomor_pendaftaran saat rollback
            $table->dropColumn('nomor_pendaftaran');
        });
    }
};
