<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCTASTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_t_a_s', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id')->unique();
            $table->string('sup_text');
            $table->string('title');
            $table->text('content');
            $table->string('url');
            $table->string('url_text');
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
        Schema::dropIfExists('c_t_a_s');
    }
}
