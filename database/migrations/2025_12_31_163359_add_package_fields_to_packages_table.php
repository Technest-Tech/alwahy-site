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
        Schema::table('packages', function (Blueprint $table) {
            $table->decimal('original_price', 10, 2)->nullable()->after('price');
            $table->integer('discount_percentage')->default(0)->after('original_price');
            $table->integer('sessions_count')->nullable()->after('sessions_per_week');
            $table->string('icon')->nullable()->after('name_ar');
            $table->string('badge')->nullable()->after('icon');
            $table->string('package_type')->default('regular')->after('badge'); // regular, intensive
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('packages', function (Blueprint $table) {
            $table->dropColumn(['original_price', 'discount_percentage', 'sessions_count', 'icon', 'badge', 'package_type']);
        });
    }
};
