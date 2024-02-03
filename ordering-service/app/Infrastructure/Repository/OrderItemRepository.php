<?php

namespace App\Infrastructure\Repository;

use App\Domain\Repository\OrderItemRepositoryInterface;

class OrderItemRepository implements OrderItemRepositoryInterface
{
    public function findById(int $id): ?object
    {
        return null;
    }

    public function findAll(): array
    {
        return [];
    }

    public function save(object $orderItem): void
    {
        throw new \Exception('Not implemented');
    }
}