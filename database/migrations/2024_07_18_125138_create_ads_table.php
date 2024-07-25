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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->enum('ad_type', ['roommate', 'place']);
            $table->string('residence_type');
            $table->decimal('budget', 10, 2);
            $table->date('availability_date');
            $table->text('description');
            $table->text('preferences')->nullable();
            $table->string('location');
            
            // الأعمدة الإضافية
            $table->string('title')->nullable();
            $table->integer('number_of_rooms')->nullable();
            $table->integer('number_of_bathrooms')->nullable();
            $table->boolean('furnished')->nullable();
            $table->boolean('smoking_allowed')->nullable();
            $table->boolean('pets_allowed')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('contact_phone')->nullable();

            $table->timestamps();

            // علاقات المفتاح الأجنبي
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
