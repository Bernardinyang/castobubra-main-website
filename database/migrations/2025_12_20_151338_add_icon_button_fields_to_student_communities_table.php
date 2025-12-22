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
        Schema::table('student_communities', function (Blueprint $table) {
            $table->string('icon')->nullable()->after('content');
            $table->string('button_text')->nullable()->after('icon');
            $table->string('button_link')->nullable()->after('button_text');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('student_communities', function (Blueprint $table) {
            $table->dropColumn(['icon', 'button_text', 'button_link']);
        });
    }
};
