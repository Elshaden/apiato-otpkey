<?php

namespace App\Containers\Vendor\OtpKey\UI\API\Controllers;

use App\Containers\Vendor\OtpKey\Actions\VaildateOtpKeyByUserIdAction;
use App\Containers\Vendor\OtpKey\UI\API\Requests\CreateOtpKeyRequest;
use App\Containers\Vendor\OtpKey\UI\API\Requests\DeleteOtpKeyRequest;
use App\Containers\Vendor\OtpKey\UI\API\Requests\FindOtpKeyByUserIdRequest;
use App\Containers\Vendor\OtpKey\UI\API\Requests\GetAllOtpKeysRequest;
use App\Containers\Vendor\OtpKey\UI\API\Requests\FindOtpKeyByIdRequest;
use App\Containers\Vendor\OtpKey\UI\API\Requests\UpdateOtpKeyRequest;
use App\Containers\Vendor\OtpKey\UI\API\Requests\ValidateOtpKeyByUserIdRequest;
use App\Containers\Vendor\OtpKey\UI\API\Transformers\OtpKeyTransformer;
use App\Containers\Vendor\OtpKey\Actions\CreateOtpKeyAction;
use App\Containers\Vendor\OtpKey\Actions\FindOtpKeyByUserIdAction;
use App\Containers\Vendor\OtpKey\Actions\GetAllOtpKeysAction;
use App\Containers\Vendor\OtpKey\Actions\UpdateOtpKeyAction;
use App\Containers\Vendor\OtpKey\Actions\DeleteOtpKeyAction;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class Controller extends ApiController
{
    public function createOtpKey(CreateOtpKeyRequest $request): JsonResponse
    {
        $otpkey = app(CreateOtpKeyAction::class)->run($request);
        return $this->created($this->transform($otpkey, OtpKeyTransformer::class));
    }

    public function findOtpKeyById(FindOtpKeyByIdRequest $request): array
    {
        $otpkey = app(FindOtpKeyByUserIdAction::class)->run($request);
        return $this->transform($otpkey, OtpKeyTransformer::class);
    }

    public function ValidateOtpKeyByUserId(ValidateOtpKeyByUserIdRequest $request){

          $Valid = app(VaildateOtpKeyByUserIdAction::class)->run($request);
          return response()->json(['result'=>$Valid], 200);
    }


    public function updateOtpKey(UpdateOtpKeyRequest $request): array
    {
        $otpkey = app(UpdateOtpKeyAction::class)->run($request);
        return $this->transform($otpkey, OtpKeyTransformer::class);
    }

    public function deleteOtpKey(DeleteOtpKeyRequest $request): JsonResponse
    {
        app(DeleteOtpKeyAction::class)->run($request);
        return $this->noContent();
    }
}
