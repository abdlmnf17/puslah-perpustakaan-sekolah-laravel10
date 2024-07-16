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
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id();
            $table->string('no_peminjaman');
            $table->date('tgl_peminjaman');
            $table->date('tgl_pengembalian');
            $table->string('status')->nullable();;
            $table->string('deskripsi')->nullable();;
            $table->decimal('total_denda', 10, 2)->default(0.00);
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('buku_id')->constrained('buku');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman');
    }
};
