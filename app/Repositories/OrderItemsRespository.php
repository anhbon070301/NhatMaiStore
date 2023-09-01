<?php

namespace App\Repositories;

use App\Models\Order_item;
use App\Repositories\Contracts\OrderItemsRepositoryInterface;

class OrderItemsRespository extends BaseRepository implements OrderItemsRepositoryInterface
{
    /**
     * @return string
     */
    public function model(): string
    {
        return Order_item::class;
    }
}
