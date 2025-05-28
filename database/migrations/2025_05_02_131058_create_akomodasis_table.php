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
        Schema::create('akomodasis', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('slug')->unique(); 
            $table->text('deskripsi')->nullable();
            $table->string('alamat')->nullable();
            $table->string('lokasi')->nullable();
            $table->decimal('harga_mulai', 10, 2)->nullable();
            $table->string('kontak')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('akomodasis');
    }
};
