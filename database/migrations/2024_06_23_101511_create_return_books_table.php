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
        Schema::create('return_books', function (Blueprint $table) {
            $table->id();
            $table->foreignId('borrow_id')->constrained('borrowings');
            $table->string('status')->nullable();;
            $table->string('description')->nullable();;
            $table->string('photo')->nullable();;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('return_books');
    }
};
