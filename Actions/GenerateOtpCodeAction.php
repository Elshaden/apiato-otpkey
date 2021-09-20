<?php

namespace App\Containers\Vendor\OtpKey\Actions;

use App\Containers\AppSection\User\Tasks\FindUserByIdTask;
use App\Containers\Vendor\OtpKey\Classes\CustomGoogleClass;
use App\Containers\Vendor\OtpKey\Models\OtpKey;
use App\Containers\Vendor\OtpKey\Tasks\UpdateOtpKeyTask;
use App\Ship\Exceptions\NotAuthorizedResourceException;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class GenerateOtpCodeAction extends Action
{
    public function run(Request $request)
    {

    $user = auth()->user();
  if(!$user->otp_key) {

      $user->CreateOtpKey();
      $user = app(FindUserByIdTask::class)->run($user->id);
  }

   return  $user->GenerateCode();
//        $xuser = 'anything';
//      return $xuser;

    }


}
