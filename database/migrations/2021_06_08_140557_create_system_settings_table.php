<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_settings', function (Blueprint $table) {
            $table->id();
            $table->string('fiat_base_currency')->default('NGN');
            $table->decimal('registration_amount', 10)->default(15000);

            $table->string('app_url')->default('https://castobubra.ng');
            $table->string('app_name')->default('Cross River State College of Nursing and Midwifery Sciences');
            $table->string('app_email')->default('info@castobubra.ng');
            $table->string('app_email_2')->default('complaint@castobubra.ng')->nullable();
            $table->string('app_email_3')->default('epayment@castobubra.ng')->nullable();
            $table->string('app_mobile_no_1')->default('+2348142209083');
            $table->string('app_mobile_no_2')->nullable();
            $table->string('app_location')->default('College Of Nursing ITIGIDI, ABI LGA, Cross River State, Nigeria');
            $table->string('timezone')->default('Africa/Lagos');
            $table->boolean('app_debug')->default(false);

            $table->string('mail_mailer')->default('smtp');
            $table->string('mail_host')->default('nl1-sr11.supercp.com');
            $table->integer('mail_port')->default(2525);
            $table->string('mail_username')->default('mediatr2');
            $table->string('mail_password')->default('a2password@2021');
            $table->string('mail_encryption')->default('tls');

            $table->string('facebook_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('youtube_url')->nullable();

            $table->boolean('is_live')->default(false);
            $table->boolean('is_registration_on')->default(false);
            $table->boolean('is_website_locked')->default(false);

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
        Schema::dropIfExists('system_settings');
    }
}
