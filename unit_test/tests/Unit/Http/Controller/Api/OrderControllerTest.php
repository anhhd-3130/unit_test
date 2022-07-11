<?php

namespace Tests\Unit\Http\Controller\Api;

use App\Http\Controllers\Api\OrderController;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use PHPUnit\Framework\TestCase;
use Mockery;

class OrderControllerTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->orderService = Mockery::mock(OrderService::class);
        $this->orderController = Mockery::mock(OrderController::class,[
            $this->orderService
        ])->makePartial();
    }

    public function set_request($request = null)
    {
        if(!$request) {
            $request = new Request();
        }
        return $request;
    }

    public function test_store()
    {
        $request = $this->set_request();
        $this->orderService
            ->shouldReceive('handelATMFee')
            ->andReturn(true);
        $response = $this->orderController->handelATMFee($request);
        $this->assertEquals(Response::HTTP_OK, $response);
    }
}
