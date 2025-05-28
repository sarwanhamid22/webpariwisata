<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Jalankan migration.
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); 
            $table->string('title');             
            $table->string('slug')->unique();    
            $table->string('location')->nullable(); 
            $table->text('content');               
            $table->string('image')->nullable();   
            $table->timestamp('published_at')->nullable(); 
            $table->enum('status', ['aman', 'ditahan'])->default('aman');
            $table->text('catatan_admin')->nullable();
        
            $table->timestamps();
        
            // Foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
        
    }

    /**
     * Batalkan migration.
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}
