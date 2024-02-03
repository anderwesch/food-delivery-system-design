<?php

namespace App\Domain\Entity;

class OrderItem
{
    public int $id;
    public string $desciption;
    public float $price;
    public int $quantity;
    public string $instructions;
    public string $itemOptions;

    public function __construct(int $id, float $price, int $quantity) {
        $this->id = $id;
        $this->price = $price;
        $this->quantity = $quantity;
    }

    public function getTotal(): float {
        return $this->price * $this->quantity;
    }
}
