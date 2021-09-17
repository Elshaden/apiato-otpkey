<?php

namespace App\Containers\Vendor\OtpKey\Models;

use App\Containers\AppSection\User\Models\User;
use App\Ship\Parents\Models\Model;

class OtpKey extends Model
{
    protected $fillable = [
        'user_id',
        'code',
        'qr_code',
        'active'
    ];

    protected $attributes = [

    ];

    protected $hidden = [

    ];

    protected $casts = [
       'active'=>'boolean',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function user(){

        return $this->belongsTo(User::class);
    }
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'OtpKey';
}
