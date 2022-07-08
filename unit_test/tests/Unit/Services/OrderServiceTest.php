<?php

namespace Tests\Unit\Services;

use App\Enum\BaseEnum;
use App\Services\OrderService;
use Mockery;
use PHPUnit\Framework\TestCase;

class OrderServiceTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->orderService = Mockery::mock(OrderService::class)->makePartial();
    }

    public function test_have_voucher()
    {
        $attributes = [
            'time' => '01/02/2022 08:44:00',
            'is_vip' => BaseEnum::HAVE_VOUCHER
        ];
        $result = $this->orderService->handelATMFee($attributes);
        $this->assertEquals(0, $result);
    }

    public function test_none_have_voucher_and_normal_day_and_start_first_time_line()
    {
        $attributes = [
            'time' => '01/02/2022 00:00:00',
            'is_vip' => BaseEnum::NONE_VOUCHER
        ];
        $result = $this->orderService->handelATMFee($attributes);
        $this->assertEquals(110, $result);
    }

    public function test_none_have_voucher_and_normal_day_and_end_first_time_line()
    {
        $attributes = [
            'time' => '01/02/2022 08:44:00',
            'is_vip' => BaseEnum::NONE_VOUCHER
        ];
        $result = $this->orderService->handelATMFee($attributes);
        $this->assertEquals(110, $result);
    }

    public function test_none_have_voucher_and_normal_day_and_start_second_time_line()
    {
        $attributes = [
            'time' => '01/02/2022 08:45:00',
            'is_vip' => BaseEnum::NONE_VOUCHER
        ];
        $result = $this->orderService->handelATMFee($attributes);
        $this->assertEquals(0, $result);
    }

    public function test_none_have_voucher_and_normal_day_and_end_second_time_line()
    {
        $attributes = [
            'time' => '01/02/2022 08:45:00',
            'is_vip' => BaseEnum::NONE_VOUCHER
        ];
        $result = $this->orderService->handelATMFee($attributes);
        $this->assertEquals(0, $result);
    }

    public function test_none_have_voucher_and_normal_day_and_start_third_time_line()
    {
        $attributes = [
            'time' => '01/02/2022 18:00:00',
            'is_vip' => BaseEnum::NONE_VOUCHER
        ];
        $result = $this->orderService->handelATMFee($attributes);
        $this->assertEquals(110, $result);
    }

    public function test_none_have_voucher_and_normal_day_and_end_third_time_line()
    {
        $attributes = [
            'time' => '01/02/2022 23:59:00',
            'is_vip' => BaseEnum::NONE_VOUCHER
        ];
        $result = $this->orderService->handelATMFee($attributes);
        $this->assertEquals(110, $result);
    }

    public function test_none_have_voucher_and_saturday_day_and_end_third_time_line()
    {
        $attributes = [
            'time' => '09/07/2022 18:00:00',
            'is_vip' => BaseEnum::NONE_VOUCHER
        ];
        $result = $this->orderService->handelATMFee($attributes);
        $this->assertEquals(110, $result);
    }

    public function test_none_have_voucher_and_saturday_day_and_start_first_time_line()
    {
        $attributes = [
            'time' => '09/07/2022 00:00:00',
            'is_vip' => BaseEnum::NONE_VOUCHER
        ];
        $result = $this->orderService->handelATMFee($attributes);
        $this->assertEquals(110, $result);
    }

    public function test_none_have_voucher_and_saturday_day_and_end_first_time_line()
    {
        $attributes = [
            'time' => '09/07/2022 08:44:00',
            'is_vip' => BaseEnum::NONE_VOUCHER
        ];
        $result = $this->orderService->handelATMFee($attributes);
        $this->assertEquals(110, $result);
    }

    public function test_none_have_voucher_and_saturday_day_and_start_second_time_line()
    {
        $attributes = [
            'time' => '09/07/2022 08:45:00',
            'is_vip' => BaseEnum::NONE_VOUCHER
        ];
        $result = $this->orderService->handelATMFee($attributes);
        $this->assertEquals(110, $result);
    }

    public function test_none_have_voucher_and_saturday_day_and_end_second_time_line()
    {
        $attributes = [
            'time' => '09/07/2022 17:59:00',
            'is_vip' => BaseEnum::NONE_VOUCHER
        ];
        $result = $this->orderService->handelATMFee($attributes);
        $this->assertEquals(110, $result);
    }

    public function test_none_have_voucher_and_saturday_day_and_start_third_time_line()
    {
        $attributes = [
            'time' => '09/07/2022 18:00:00',
            'is_vip' => BaseEnum::NONE_VOUCHER
        ];
        $result = $this->orderService->handelATMFee($attributes);
        $this->assertEquals(110, $result);
    }

    public function test_none_have_voucher_and_sunday_day_and_start_first_time_line()
    {
        $attributes = [
            'time' => '10/07/2022 00:00:00',
            'is_vip' => BaseEnum::NONE_VOUCHER
        ];
        $result = $this->orderService->handelATMFee($attributes);
        $this->assertEquals(110, $result);
    }

    public function test_none_have_voucher_and_sunday_day_and_end_first_time_line()
    {
        $attributes = [
            'time' => '10/07/2022 08:44:00',
            'is_vip' => BaseEnum::NONE_VOUCHER
        ];
        $result = $this->orderService->handelATMFee($attributes);
        $this->assertEquals(110, $result);
    }

    public function test_none_have_voucher_and_sunday_day_and_start_second_time_line()
    {
        $attributes = [
            'time' => '10/07/2022 08:45:00',
            'is_vip' => BaseEnum::NONE_VOUCHER
        ];
        $result = $this->orderService->handelATMFee($attributes);
        $this->assertEquals(110, $result);
    }

    public function test_none_have_voucher_and_sunday_day_and_end_second_time_line()
    {
        $attributes = [
            'time' => '10/07/2022 17:59:00',
            'is_vip' => BaseEnum::NONE_VOUCHER
        ];
        $result = $this->orderService->handelATMFee($attributes);
        $this->assertEquals(110, $result);
    }

    public function test_none_have_voucher_and_sunday_day_and_start_third_time_line()
    {
        $attributes = [
            'time' => '10/07/2022 18:00:00',
            'is_vip' => BaseEnum::NONE_VOUCHER
        ];
        $result = $this->orderService->handelATMFee($attributes);
        $this->assertEquals(110, $result);
    }

    public function test_none_have_voucher_and_sunday_day_and_end_third_time_line()
    {
        $attributes = [
            'time' => '10/07/2022 23:59:00',
            'is_vip' => BaseEnum::NONE_VOUCHER
        ];
        $result = $this->orderService->handelATMFee($attributes);
        $this->assertEquals(110, $result);
    }

    public function test_none_have_voucher_and_holiday_day_and_start_first_time_line()
    {
        $attributes = [
            'time' => '01/01/2022 00:00:00',
            'is_vip' => BaseEnum::NONE_VOUCHER
        ];
        $result = $this->orderService->handelATMFee($attributes);
        $this->assertEquals(110, $result);
    }

    public function test_none_have_voucher_and_holiday_day_and_end_first_time_line()
    {
        $attributes = [
            'time' => '01/01/2022 08:44:00',
            'is_vip' => BaseEnum::NONE_VOUCHER
        ];
        $result = $this->orderService->handelATMFee($attributes);
        $this->assertEquals(110, $result);
    }

    public function test_none_have_voucher_and_holiday_day_and_start_second_time_line()
    {
        $attributes = [
            'time' => '01/01/2022 08:45:00',
            'is_vip' => BaseEnum::NONE_VOUCHER
        ];
        $result = $this->orderService->handelATMFee($attributes);
        $this->assertEquals(110, $result);
    }

    public function test_none_have_voucher_and_holiday_day_and_end_second_time_line()
    {
        $attributes = [
            'time' => '01/01/2022 17:59:00',
            'is_vip' => BaseEnum::NONE_VOUCHER
        ];
        $result = $this->orderService->handelATMFee($attributes);
        $this->assertEquals(110, $result);
    }

    public function test_none_have_voucher_and_holiday_day_and_start_third_time_line()
    {
        $attributes = [
            'time' => '01/01/2022 18:00:00',
            'is_vip' => BaseEnum::NONE_VOUCHER
        ];
        $result = $this->orderService->handelATMFee($attributes);
        $this->assertEquals(110, $result);
    }

    public function test_none_have_voucher_and_holiday_day_and_end_third_time_line()
    {
        $attributes = [
            'time' => '01/01/2022 23:59:00',
            'is_vip' => BaseEnum::NONE_VOUCHER
        ];
        $result = $this->orderService->handelATMFee($attributes);
        $this->assertEquals(110, $result);
    }
}
