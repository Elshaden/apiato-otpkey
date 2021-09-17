<?php

/**
 * @apiGroup           OtpKey
 * @apiName            findOtpKeyById
 *
 * @api                {GET} /v1/otpkeys/:id Endpoint title here..
 * @apiDescription     Endpoint description here..
 *
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiParam           {String}  parameters here..
 *
 * @apiSuccessExample  {json}  Success-Response:
 * HTTP/1.1 200 OK
{
  // Insert the response of the request here...
}
 */

use App\Containers\Vendor\OtpKey\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('otpkeys/{id}', [Controller::class, 'findOtpKeyById'])
    ->name('api_otpkey_find_otp_key_by_id')
   ->middleware(['azure:api']);

