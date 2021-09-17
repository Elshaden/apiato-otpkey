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
              if(config('vendor-otpkey.primary_user_key_type') == 'integer')
             $table->integer('user_id')->unsigned();

              if(config('vendor-otpkey.primary_user_key_type') == 'bigInteger')
               $table->bigInteger('user_id')->unsigned();


             $table->text('code');
             $table->text('qr_code');
             $table->boolean('active')->default(1);
            $table->timestamps();
            if(config('vendor-otpkey.add_foreign_key'))
            $table->foreign('user_id')->references(config('vendor-otpkey.primary_user_key'))->on('users')->cascadeOnDelete();

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
