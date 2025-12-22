<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGridnoxContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gridnox_contacts', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id')->unique();
            $table->string('names');
            $table->string('email');
            $table->string('mobile_no');
            $table->text('message');
            $table->foreignId('read_by')->nullable()->constrained('users')->cascadeOnDelete();
            $table->timestamp('is_read')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gridnox_contacts');
    }
}
