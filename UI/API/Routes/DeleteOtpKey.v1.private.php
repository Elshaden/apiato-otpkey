<?php

/**
 * @apiGroup           OtpKey
 * @apiName            deleteOtpKey
 *
 * @api                {DELETE} /v1/otpkeys/:id Endpoint title here..
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

Route::delete('otpkeys/{id}', [Controller::class, 'deleteOtpKey'])
    ->name('api_otpkey_delete_otp_key')
    ->middleware(['auth:api']);

