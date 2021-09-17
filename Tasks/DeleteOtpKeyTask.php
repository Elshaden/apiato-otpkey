<?php

namespace App\Containers\Vendor\OtpKey\Tasks;

use App\Containers\Vendor\OtpKey\Data\Repositories\OtpKeyRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteOtpKeyTask extends Task
{
    protected OtpKeyRepository $repository;

    public function __construct(OtpKeyRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id): ?int
    {
        try {
            return $this->repository->delete($id);
        }
        catch (Exception $exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
