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
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('phone')->nullable()->after('email_verified_at');
            $table->string('profile_image',250)->nullable()->after('phone');
            $table->string('birth_date')->nullable()->after('profile_image');
            $table->string('biography',300)->nullable()->after('birth_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'phone',
                'profile_image',
                'birth_date',
                'biography',
            ]);
        });
    }
};
