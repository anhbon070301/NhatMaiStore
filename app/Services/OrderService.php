<?php

namespace App\Services;

use App\Repositories\Contracts\OrderRepositoryInterface;
use App\Services\Contracts\OrderServiceInterface;
use Illuminate\Support\Arr;

class OrderService implements OrderServiceInterface
{
    protected $orderRepository;

    /**
     * @param OrderRepositoryInterface $orderRepositoryInterface
     */
    public function __construct(OrderRepositoryInterface $orderRepositoryInterface)
    {
        return $this->orderRepository = $orderRepositoryInterface;
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public function list(array $attributes)
    {
        $attributes = [
            ["customer_name", "LIKE",  Arr::get($attributes, "inputName")],
            ["customer_phone", "LIKE", Arr::get($attributes, "inputPhone")],
            ["customer_email", "LIKE", Arr::get($attributes, "inputEmail")],
        ];

        return $this->orderRepository->list(condition($attributes));
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        return $this->orderRepository->create($attributes);
    }

    /**
     * @param array $attributes
     * @param int $id
     * @return mixed
     */
    public function update(array $attributes, int $id)
    {
        return $this->orderRepository->update($attributes, $id);
    }

    /**
     * @param int $id
     * @return int
     */
    public function delete(int $id): int
    {
        return $this->orderRepository->delete($id);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function detail(int $id)
    {
        return $this->orderRepository->find($id);
    }

    public function updateActive(array $attribute) 
    {
        $value = [
            "active" => $attribute['status']
        ];

        return $this->orderRepository->updateActive($attribute['id'], $value);
    }
}
