<?php

namespace Tests\Unit\Services;

use App\Services\OrderService;
use PHPUnit\Framework\TestCase;
use Mockery;

class OrderServiceTest extends TestCase
{
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

    public function test_handle_discount_product_buy_less_than_seven_product_and_none_tie()
    {
        $data = [
            [
                "product_type" => 1,
                "amount" => 2
            ],
            [
                "product_type" => 3,
                "amount" => 3
            ]
        ];
        $result = $this->orderService->handledDiscountProduct($data);
        $this->assertEquals(0, $result);
    }

    public function test_handle_discount_product_buy_less_than_seven_product_and_none_shirt()
    {
        $data = [
            [
                "product_type" => 2,
                "amount" => 2
            ],
            [
                "product_type" => 3,
                "amount" => 3
            ]
        ];
        $result = $this->orderService->handledDiscountProduct($data);
        $this->assertEquals(0, $result);
    }

    public function test_handle_discount_product_buy_less_than_seven_product_and_none_shirt_and_none_tie()
    {
        $data = [
            [
                "product_type" => 4,
                "amount" => 2
            ],
            [
                "product_type" => 3,
                "amount" => 3
            ]
        ];
        $result = $this->orderService->handledDiscountProduct($data);
        $this->assertEquals(0, $result);
    }

    public function test_handle_discount_product_buy_less_than_seven_product_and_shirt_and_tie()
    {
        $data = [
            [
                "product_type" => 1,
                "amount" => 2
            ],
            [
                "product_type" => 2,
                "amount" => 3
            ]
        ];
        $result = $this->orderService->handledDiscountProduct($data);
        $this->assertEquals(5, $result);
    }

    public function test_handle_discount_product_buy_more_than_seven_product_and_shirt_and_tie()
    {
        $data = [
            [
                "product_type" => 1,
                "amount" => 4
            ],
            [
                "product_type" => 2,
                "amount" => 3
            ]
        ];
        $result = $this->orderService->handledDiscountProduct($data);
        $this->assertEquals(12, $result);
    }

    public function test_handle_discount_product_buy_more_than_seven_product_and_none_shirt_and_tie()
    {
        $data = [
            [
                "product_type" => 3,
                "amount" => 4
            ],
            [
                "product_type" => 2,
                "amount" => 3
            ]
        ];
        $result = $this->orderService->handledDiscountProduct($data);
        $this->assertEquals(7, $result);
    }

    public function test_handle_discount_product_buy_more_than_seven_product_and_shirt_and_none_tie()
    {
        $data = [
            [
                "product_type" => 1,
                "amount" => 4
            ],
            [
                "product_type" => 3,
                "amount" => 3
            ]
        ];
        $result = $this->orderService->handledDiscountProduct($data);
        $this->assertEquals(7, $result);
    }

    public function test_handle_discount_product_buy_more_than_seven_product_and_none_shirt_and_none_tie()
    {
        $data = [
            [
                "product_type" => 4,
                "amount" => 4
            ],
            [
                "product_type" => 3,
                "amount" => 3
            ]
        ];
        $result = $this->orderService->handledDiscountProduct($data);
        $this->assertEquals(7, $result);
    }
}
