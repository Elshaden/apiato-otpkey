<?php

namespace App\Containers\Vendor\OtpKey\UI\API\Transformers;

use App\Containers\Vendor\OtpKey\Models\OtpKey;
use App\Ship\Parents\Transformers\Transformer;

class OtpKeyTransformer extends Transformer
{
    /**
     * @var  array
     */
    protected $defaultIncludes = [

    ];

    /**
     * @var  array
     */
    protected $availableIncludes = [

    ];

    public function transform(OtpKey $otpkey): array
    {
        $response = [
            'object' => $otpkey->getResourceKey(),
            'id' => $otpkey->getHashedKey(),
            'user_id'  =>$otpkey->user_id,
            'code'=>decrypt($otpkey->code),
            'qr_code'=>decrypt($otpkey->qr_code),
            'active'=> $otpkey->active,
            'created_at' => $otpkey->created_at,
            'updated_at' => $otpkey->updated_at,
            'readable_created_at' => $otpkey->created_at->diffForHumans(),
            'readable_updated_at' => $otpkey->updated_at->diffForHumans(),

        ];

        $response = $this->ifAdmin([
            'real_id'    => $otpkey->id,
            'real_user_id'=>$otpkey->user_id
            // 'deleted_at' => $otpkey->deleted_at,
        ], $response);

        return $response;
    }
}
