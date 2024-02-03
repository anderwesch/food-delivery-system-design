<?php

namespace App\UseCases;

use App\Domain\Entity\Order;
use App\Domain\Repository\CustomerRepositoryInterface;
use App\Domain\Repository\OrderRepositoryInterface;

class PlaceOrder
{
    private $customerRepository;
    private $orderRepository;

    public function __construct(
        CustomerRepositoryInterface $customerRepository, 
        OrderRepositoryInterface $orderRepository
    ) {
        $this->customerRepository = $customerRepository;
        $this->orderRepository = $orderRepository;
    }

    public function execute(array $input) {
        $order = new Order(
            $this->customerRepository->findById($input["customerId"]),
            $input["address"]
        );

        foreach($input["items"] as $item) {
            if($item["quantity"] < 1) {
                throw new \Exception("Invalid quantity");
            }
            $order->addItem($item["id"], $item["price"], $item["quantity"]);
        }

        $this->orderRepository->save($order);

        return [
            "items" => $order->getItems(),
            "total" => $order->getTotal(),
            "status" => "created"
        ];
    }
}
