<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OrderController extends Controller
{
    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function createOrderBeer(Request $request)
    {
        $this->orderService->createOrderBeer($request->only('amount', 'is_voucher', 'time'));
        return \Illuminate\Http\Response::HTTP_OK;
    }

    public function handledDiscountProduct(Request $request)
    {
        $this->orderService->handledDiscountProduct($request->data);
        return Response::HTTP_OK;
    }
}
