<?php

namespace App\Services;

use App\Enum\BaseEnum;
use Carbon\Carbon;
use Cmixin\BusinessDay;

class OrderService
{
    public function createOrderBeer($attributes)
    {
        $conditionStart = Carbon::createFromFormat('H:i:s', $attributes['time'])
            >= Carbon::createFromFormat('H:i:s', '16:00:00');
        $conditionEnd = Carbon::createFromFormat('H:i:s', $attributes['time'])
            <= Carbon::createFromFormat('H:i:s', '17:59:00');
        $priceBeer = $conditionStart && $conditionEnd ? 290 : 490;
        $firstBeerPrice = $attributes['is_voucher'] == BaseEnum::HAVE_VOUCHER ? 100 : $priceBeer;
        return $firstBeerPrice + $priceBeer * ($attributes['amount'] - 1);
    }

    public function handelATMFee($attributes)
    {
        $withdrawalDate = Carbon::createFromFormat('d/m/Y H:i:s', $attributes['time']);
        $stringTime = $withdrawalDate->format('d/m/Y');
        $startSecondTimeLine = Carbon::createFromFormat('d/m/Y H:i:s', $stringTime . ' 08:45:00');
        $endSecondTimeLine = Carbon::createFromFormat('d/m/Y H:i:s', $stringTime . ' 17:59:00');
        BusinessDay::enable('Carbon\Carbon');
        Carbon::setHolidaysRegion('test');
        Carbon::addHolidays('test', [
            'new-year' => '01-01',
            'national-day' => '09-02',
        ]);
        $price = 110;
        $condition = $withdrawalDate->between($startSecondTimeLine, $endSecondTimeLine);
        if ($attributes['is_vip'] || ($condition && !$withdrawalDate->isWeekend() && !$withdrawalDate->isHoliday())) {
            $price = 0;
        }
        return $price;
    }
}
