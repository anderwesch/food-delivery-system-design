<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UseCases\PlaceOrder;

class OrderController extends Controller
{
    public function place(Request $request)
    {
        $input = [
            'customer' => 'John Doe',
            'address' => '123 Main St',
            'items' => [
                ['id' => 1, 'price' => 5, 'quantity' => 1],
                ['id' => 2, 'price' => 8, 'quantity' => 2],
                ['id' => 3, 'price' => 3, 'quantity' => 3],
            ]
        ];
        $placeOrder = new PlaceOrder();
        $output = $placeOrder->execute($input);
        return response()->json($output);
    }
}
