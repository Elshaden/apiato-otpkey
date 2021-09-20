<?php

namespace App\Containers\Vendor\OtpKey\Exceptions;

use App\Ship\Parents\Exceptions\Exception;
use Symfony\Component\HttpFoundation\Response;

class WrongCodeException extends Exception
{
    protected $code = Response::HTTP_NOT_ACCEPTABLE;
    protected $message = 'Wrong OTP Code.';
}
