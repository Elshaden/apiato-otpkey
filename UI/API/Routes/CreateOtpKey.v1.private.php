<?php

/**
 * @apiGroup           OtpKey
 * @apiName            createOtpKey
 *
 * @api                {POST} /v1/otpkeys Endpoint title here..
 * @apiDescription     Endpoint description here..
 *
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiParam           {String}  parameters here..
 *
 * @apiSuccessExample  {json}  Success-Response:
 * HTTP/1.1 200 OK
 * {
 * // Insert the response of the request here...
 * }
 */

use App\Containers\Vendor\OtpKey\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::post('otpkeys', [Controller::class, 'createOtpKey'])
    ->name('api_otpkey_create_otp_key')
  ->middleware(['azure:api']);

