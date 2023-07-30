<?php
namespace App\Repositories\Contracts;

interface ProductReponsitoryInterface extends RepositoryInterface
{
    public function listProduct(array $conditions);
    public function getProduct();
    public function getProductFE(array $conditions);
}