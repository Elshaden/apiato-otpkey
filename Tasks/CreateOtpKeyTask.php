<?php

namespace App\Containers\Vendor\OtpKey\Tasks;

use App\Containers\Vendor\OtpKey\Data\Repositories\OtpKeyRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateOtpKeyTask extends Task
{
    protected OtpKeyRepository $repository;

    public function __construct(OtpKeyRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {

        try {
            return $this->repository->create($data);
        }
        catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}
