<?php

namespace App\Containers\Vendor\OtpKey\Actions;

use App\Containers\AppSection\User\Tasks\FindUserByIdTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use OTPHP\TOTP;

class VaildateOtpKeyByUserIdAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            'id',
            'pin'

        ]);
        $User = app(FindUserByIdTask::class)->run($data['id']);
        $Code = $User->ValidateKey($data['pin']);
        return $Code;
    }
}
