<?php
namespace App\Repositories\Contracts;

interface OrderRepositoryInterface extends RepositoryInterface
{
    public function getOrder();
}