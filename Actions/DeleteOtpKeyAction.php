<?php

namespace App\Containers\Vendor\OtpKey\Actions;

use App\Containers\Vendor\OtpKey\Tasks\DeleteOtpKeyTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class DeleteOtpKeyAction extends Action
{
    public function run(Request $request)
    {
        return app(DeleteOtpKeyTask::class)->run($request->id);
    }
}
