<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Services\OrderService;
use http\Env\Response;
use Illuminate\Http\Request;

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
}
