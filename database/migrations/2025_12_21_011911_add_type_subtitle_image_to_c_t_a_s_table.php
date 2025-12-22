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
        Schema::table('c_t_a_s', function (Blueprint $table) {
            $table->enum('type', ['text', 'image'])->default('text')->after('unique_id');
            $table->string('subtitle')->nullable()->after('title');
            $table->string('img')->nullable()->after('subtitle');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('c_t_a_s', function (Blueprint $table) {
            $table->dropColumn(['type', 'subtitle', 'img']);
        });
    }
};
