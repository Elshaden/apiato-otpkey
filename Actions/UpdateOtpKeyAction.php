<?php

namespace App\Containers\Vendor\OtpKey\Actions;

use App\Containers\AppSection\User\Tasks\FindUserByIdTask;
use App\Containers\Vendor\OtpKey\Models\OtpKey;
use App\Containers\Vendor\OtpKey\Tasks\UpdateOtpKeyTask;
use App\Ship\Exceptions\NotAuthorizedResourceException;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class UpdateOtpKeyAction extends Action
{
    public function run(Request $request): OtpKey
    {
        $data = $request->sanitizeInput([
            'user_id',
       //     'code',
            'active' ,
            ]);
        if($data['active']) {
            $User = app(FindUserByIdTask::class)->run($data['user_id']);
            return $User->ActivateMfa();
        }

        throw new NotAuthorizedResourceException()  ;
    }
}
