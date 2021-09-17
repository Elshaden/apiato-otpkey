<?php

namespace App\Containers\Vendor\OtpKey\Actions;

use App\Containers\Vendor\OtpKey\Models\OtpKey;
use App\Containers\Vendor\OtpKey\Tasks\FindOtpKeyByUserIdTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class FindOtpKeyByUserIdAction extends Action
{
    public function run(Request $request): OtpKey
    {
        return app(FindOtpKeyByUserIdTask::class)->run($request->id);
    }
}
