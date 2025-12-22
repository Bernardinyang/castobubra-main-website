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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id')->unique();
            
            // Personal Information
            $table->string('surname');
            $table->string('first_name');
            $table->string('other_name')->nullable();
            $table->string('email');
            $table->string('phone_number');
            $table->enum('gender', ['Male', 'Female', 'Other'])->nullable();
            $table->enum('marital_status', ['Single', 'Married', 'Divorced', 'Widowed'])->nullable();
            $table->string('state_of_origin')->nullable();
            $table->string('local_government')->nullable();
            $table->text('current_address')->nullable();
            
            // Programme Selection
            $table->foreignId('programme_id')->nullable()->constrained('programmes')->onDelete('set null');
            
            // Document Uploads
            $table->string('ssce_certificate')->nullable();
            $table->string('birth_certificate')->nullable();
            $table->string('passport_photograph')->nullable();
            $table->string('evidence_of_payment')->nullable();
            $table->string('other_uploads')->nullable();
            
            // Status
            $table->enum('status', ['pending', 'under_review', 'accepted', 'rejected'])->default('pending');
            $table->text('remarks')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
