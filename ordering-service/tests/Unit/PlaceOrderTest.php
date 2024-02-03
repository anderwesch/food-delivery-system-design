<?php

namespace Tests\Unit;

use App\Infrastructure\Repository\CustomerRepository;
use App\Infrastructure\Repository\OrderRepository;
use PHPUnit\Framework\TestCase;
use App\UseCases\PlaceOrder;

class PlaceOrderTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_should_place_order_with_three_items(): void
    {
        $input = [
            'customerId' => 1,
            'merchantId' => 1,
            'address' => [ 'street' => '123 Main St', 'zip_code' => '83020335'],
            'items' => [
                ['id' => 1, 'price' => 5, 'quantity' => 1],
                ['id' => 2, 'price' => 8, 'quantity' => 2],
                ['id' => 3, 'price' => 3, 'quantity' => 3],
            ]
        ];
        $customerRepository = new CustomerRepository;
        $orderRepository = new OrderRepository;
        $placeOrder = new PlaceOrder($customerRepository, $orderRepository);
        $output = $placeOrder->execute($input);
        $this->assertEquals(30, $output['total']);
        $this->assertEquals(3, count($output['items']));
        $this->assertEquals('created', $output['status']);
    }
}
