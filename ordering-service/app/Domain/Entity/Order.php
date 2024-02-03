<?php

namespace App\Domain\Entity;

use App\Domain\Entity\Customer;
use App\Domain\Entity\OrderItem;

class Order
{
    public array $items;
    public float $total;
    public Customer $customer;
    public array $address;

    public function __construct($customer, $address) {
        $this->customer = $customer;
        $this->items = [];
        $this->total = 0;
        $this->address = $address;
    }

    public function addItem($id, $price, $quantity) {
        $this->items[] = new OrderItem($id, $price, $quantity);
    }

    public function getItems(): array {
        return $this->items;
    }

    public function getTotal(): float {
        foreach ($this->items as $item) {
            $this->total += $item->getTotal();
        }
        return $this->total;
    }
}
