<?php

namespace App\Containers\Vendor\OtpKey\Tasks;

use App\Containers\Vendor\OtpKey\Data\Repositories\OtpKeyRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateOtpKeyTask extends Task
{
    protected OtpKeyRepository $repository;

    public function __construct(OtpKeyRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        try {
            return $this->repository->update($data, $id);
        }
        catch (Exception $exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
