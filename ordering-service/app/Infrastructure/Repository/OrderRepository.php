<?php

namespace App\Infrastructure\Repository;

use App\Domain\Entity\Order;
use App\Domain\Repository\OrderRepositoryInterface;

class OrderRepository implements OrderRepositoryInterface
{
    private array $orders;

    public function save(Order $order): void
    {
        $this->orders[] = $order;
    }
}