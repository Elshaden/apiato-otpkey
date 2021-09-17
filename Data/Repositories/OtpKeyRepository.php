<?php

namespace App\Containers\Vendor\OtpKey\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

class OtpKeyRepository extends Repository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
