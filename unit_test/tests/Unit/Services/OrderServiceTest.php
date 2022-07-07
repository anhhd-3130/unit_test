<?php

namespace Tests\Unit\Services;

use App\Enum\BaseEnum;
use App\Models\Order;
use App\Services\OrderService;
use PHPUnit\Framework\TestCase;
use Mockery;


class OrderServiceTest extends TestCase
{
    protected $orderRepository;
    protected $orderService;
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function setUp(): void
    {
        parent::setUp();
        $this->orderService = Mockery::mock(OrderService::class)->makePartial();
    }

    public function test_create_order_beer_have_voucher_and_time_sale()
    {
        $attributes = [
            'is_voucher' => BaseEnum::HAVE_VOUCHER,
            'time' => '16:00:00',
            'amount' => 2,
        ];

        $result = $this->orderService->createOrderBeer($attributes);
        $this->assertEquals(390, $result);
    }

    public function test_create_order_beer_have_voucher_and_end_time_sale()
    {
        $attributes = [
            'is_voucher' => BaseEnum::HAVE_VOUCHER,
            'time' => '17:59:00',
            'amount' => 2,
        ];

        $result = $this->orderService->createOrderBeer($attributes);
        $this->assertEquals(390, $result);
    }

    public function test_create_order_beer_have_voucher_and_out_of_time_sale()
    {
        $attributes = [
            'is_voucher' => BaseEnum::HAVE_VOUCHER,
            'time' => '15:00:00',
            'amount' => 2,
        ];

        $result = $this->orderService->createOrderBeer($attributes);
        $this->assertEquals(590, $result);
    }

    public function test_create_order_beer_none_have_voucher_and_time_sale()
    {
        $attributes = [
            'is_voucher' => BaseEnum::NONE_VOUCHER,
            'time' => '16:00:00',
            'amount' => 2,
        ];

        $result = $this->orderService->createOrderBeer($attributes);
        $this->assertEquals(580, $result);
    }

    public function test_create_order_beer_none_have_voucher_and_out_of_time_sale()
    {
        $attributes = [
            'is_voucher' => BaseEnum::NONE_VOUCHER,
            'time' => '14:00:00',
            'amount' => 2,
        ];

        $result = $this->orderService->createOrderBeer($attributes);
        $this->assertEquals(980, $result);
    }
}
