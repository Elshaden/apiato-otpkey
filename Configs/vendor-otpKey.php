<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Vendor Section OtpKey Container
    |--------------------------------------------------------------------------
    |
    |
    |
    */
      'QR_Code_size'=>120,  // Pixels


       'auth_middleware'=>['azure:api']  ,

      'add_foreign_key' =>true,

      'primary_user_key'=>'id',

      'primary_user_key_type'=> 'integer',
];
