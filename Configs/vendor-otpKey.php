<?php

return [

      /*
      |--------------------------------------------------------------------------
      | Vendor Section OtpKey Container
      |--------------------------------------------------------------------------
      |   You may change the setting in the config as you like
      |
      |
      */


      /*
    |--------------------------------------------------------------------------
    | QR_Code_size
    |--------------------------------------------------------------------------
    |   This the pixel size of the generated QR Code
    |
    */
      'QR_Code_size' => 120,  // Pixels

      /*
       |--------------------------------------------------------------------------
       | Slots
       |--------------------------------------------------------------------------
       |   Each slot is 30 Seconds,
       |     You can specify the default Number of Slots you want to go back to validate a secret key
       |   slots = 10 ,  for example the validation result  will be true for any secrete key issued within the last 3 minutes
       |   10 being 10 * 30 seconds = 3 minutes
       */
      'slots' => 6,

      /*
    |--------------------------------------------------------------------------
    | auth_middleware
    |--------------------------------------------------------------------------
    |   The Route Auth middleware for all routes
    |   the default is  ['auth:api']
    */


      'auth_middleware' => env('OTPKEY_MIDDLEWARE','auth:api'),

];
