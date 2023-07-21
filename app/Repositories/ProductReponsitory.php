<?php

namespace App\Repositories;

use App\Constants\Common;
use App\Models\Product;
use App\Repositories\Contracts\ProductReponsitoryInterface;

class ProductReponsitory extends BaseRepository implements ProductReponsitoryInterface
{
    /**
     * @return string
     */
    public function model(): string
    {
        return Product::class;
    }

    public function listProduct(array $conditions)
    {
        $this->applyConditions(condition($conditions));
        return $this->model
                    ->orderBy('sort_order', 'ASC')
                    ->paginate(Common::PAGINATE_BE);
    }
}
