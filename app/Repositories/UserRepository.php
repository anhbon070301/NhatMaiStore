<?php

namespace App\Repositories;

use App\Constants\Common;
use App\Models\Admin;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    /**
     * @return string
     */
    public function model(): string
    {
        return Admin::class;
    }

        /**
     * list paginate
     * @param array $conditions
     * @return array
     */
    public function list(array $conditions)
    {
        $this->applyConditions(condition($conditions));
        return $this->model
                    ->paginate(Common::PAGINATE_BE);
    }
}
