<?php

namespace App\Containers\Vendor\OtpKey\Actions;

use App\Containers\AppSection\User\Tasks\FindUserByIdTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;


class CreateOtpKeyAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            'user_id',

        ]);
        $User = app(FindUserByIdTask::class)->run($data['user_id']);
        $Code = $User->CreateOtpKey();
        return $Code;
    }
}
