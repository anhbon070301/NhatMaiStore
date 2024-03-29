<?php

namespace App\Services\Contracts;

interface CartServiceInterface
{
    public function list(int $id);

    public function create(array $attributes);

    public function update(array $request, int $id);
}
