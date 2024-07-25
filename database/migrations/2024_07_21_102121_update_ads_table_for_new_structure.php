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
        Schema::table('ads', function (Blueprint $table) {

            $table->enum('status', ['open', 'closed'])->default('open');
            
            // إضافة الحقول الخاصة بالبحث عن شريك
            $table->integer('partner_age_min')->nullable();
            $table->integer('partner_age_max')->nullable();
            $table->enum('partner_gender', ['male', 'female', 'any'])->nullable();
            
            // إضافة الحقول الخاصة بالبحث عن مسكن
            $table->string('accommodation_type')->nullable(); // مثل: شقة، منزل، غرفة
       
            $table->unsignedBigInteger('country_id')->nullable()->after('location');
            $table->unsignedBigInteger('city_id')->nullable()->after('country_id');
            $table->text('notes')->nullable()->after('contact_email');
            $table->decimal('room_size', 8, 2)->nullable()->after('title');

            // إضافة المفاتيح الخارجية
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('set null');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('set null');
            
            // إزالة الحقول غير اللازمة إذا كان هناك أي تكرار
            // $table->dropColumn(['old_field1', 'old_field2']); // مثال إذا كنت بحاجة لإزالة حقول قديمة
        });
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ads', function (Blueprint $table) {
            $table->dropColumn(['status', 'search_for_partner', 'partner_preferences', 'partner_age_min', 'partner_age_max', 'partner_gender', 'search_for_accommodation', 'accommodation_type', 'budget', 'price', 'number_of_rooms', 'number_of_bathrooms', 'furnished', 'smoking_allowed', 'pets_allowed']);
            $table->dropForeign(['country_id']);
            $table->dropForeign(['city_id']);

            // إزالة الحقول
            $table->dropColumn(['country_id', 'city_id']);
        });
    }
};
