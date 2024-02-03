<?php

namespace App\Domain\Repository;

use App\Domain\Entity\OrderItem;

interface OrderItemRepositoryInterface
{
    public function findById(int $id): array;
    public function findAll(): array;
    public function save(OrderItem $orderItem): void;
}