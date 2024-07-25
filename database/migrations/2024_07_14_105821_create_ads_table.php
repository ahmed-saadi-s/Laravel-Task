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
        Schema::create('ads', function (Blueprint $table) {
            $table->id(); 
            $table->string('title'); 
            $table->text('description')->nullable(); 
            $table->decimal('budget', 10, 2)->nullable(); 
            $table->foreignId('ads_type_id')->constrained('ads_type')->onDelete('cascade'); 
            $table->foreignId('residence_type_id')->constrained('residence_type')->onDelete('cascade'); 
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ads');
    }
};
