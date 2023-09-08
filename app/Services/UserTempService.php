<?php

namespace App\Services;

use App\Repositories\Contracts\UserTempRepositoryInterface;
use App\Services\Contracts\UserTempServiceInterface;

class UserTempService implements UserTempServiceInterface
{
    protected $userRepository;

    /**
     * @param UserTempRepositoryInterface $userRepository
     */
    public function __construct (
        UserTempRepositoryInterface $userRepository,
    )
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        return $this->userRepository->create($attributes);
    }

    /**
     * @param int $id
     * @return int
     */
    public function delete(int $id): int
    {
        return $this->userRepository->delete($id);
    }
}
