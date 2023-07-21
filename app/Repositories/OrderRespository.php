<?php

namespace App\Repositories;

use App\Models\Order;
use App\Repositories\Contracts\OrderRepositoryInterface;

class OrderRespository extends BaseRepository implements OrderRepositoryInterface
{
    /**
     * @return string
     */
    public function model(): string
    {
        return Order::class;
    }
}
