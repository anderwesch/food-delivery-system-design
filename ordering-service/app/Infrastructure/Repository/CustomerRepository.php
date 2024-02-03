<?php

namespace App\Infrastructure\Repository;

use App\Domain\Entity\Customer;
use App\Domain\Repository\CustomerRepositoryInterface;

class CustomerRepository implements CustomerRepositoryInterface
{
    private array $customers;

    public function __construct()
    {
        $this->customers = [
            new Customer(1, 'John Doe', 'XXXXXXXXXXXX'),
            new Customer(2, 'Jane Doe', 'XXXXXXXXXXXX'),
            new Customer(3, 'John Smith', 'XXXXXXXXXXXX'),
            new Customer(4, 'Jane Smith', 'XXXXXXXXXXXX'),
        ];
    }

    public function findById(int $id): ?Customer
    {
        return array_filter($this->customers, function (Customer $customer) use ($id) {
            return $customer->getId() === $id;
        })[0];
    }

    public function save(Customer $customer): void
    {
        $this->customers[] = $customer;
    }

    public function delete(Customer $customer): void
    {
    }

    public function findAll(): array
    {
        return $this->customers;
    }
}
