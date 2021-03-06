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

Route::post('validate-otpkeys', [Controller::class, 'ValidateOtpKeyByUserId'])
    ->name('api_otpkey_validate_otp_key_by_user_id')
  ->middleware([config('vendor-otpKey.auth_middleware')]);

