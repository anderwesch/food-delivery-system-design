<?php

namespace App\Domain\Repository;

use App\Domain\Entity\Customer;

interface CustomerRepositoryInterface
{
    public function findById(int $id): ?Customer;
    public function save(Customer $customer): void;
    public function delete(Customer $customer): void;
    public function findAll(): array;
}
