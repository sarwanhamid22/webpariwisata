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
        Schema::create('hero_slides', function (Blueprint $table) {
            $table->id();
            $table->uuid('group_id'); // Hapus ->after('id')
            $table->string('title');              
            $table->text('subtitle')->nullable(); 
            $table->string('image');             
            $table->boolean('is_active')->default(true); 
            $table->unsignedInteger('order')->default(0); 
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hero_slides');
    }
};
