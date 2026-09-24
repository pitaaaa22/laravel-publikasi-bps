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
        Schema::create('publikasis', function (Blueprint $table) {
    $table->id();
    $table->string('nomor');
    $table->string('judul');
    $table->string('kategori');
    $table->string('ukuran_file');
    $table->text('link_download');
    $table->date('tanggal_rilis');
    $table->string('sampul')->nullable();
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publikasis');
    }
};
