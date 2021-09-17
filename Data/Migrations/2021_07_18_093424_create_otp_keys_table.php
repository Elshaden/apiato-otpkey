<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOtpKeysTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('otp_keys', function (Blueprint $table) {
            $table->id();
             $table->bigInteger('user_id')->unsigned();
             $table->text('code');
             $table->text('qr_code');
             $table->boolean('active')->default(1);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('otp_keys');
    }
}
