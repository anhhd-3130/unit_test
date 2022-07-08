<?php

namespace App\Services;

use App\Enum\BaseEnum;
use Carbon\Carbon;

class OrderService
{
    public function createOrderBeer($attributes)
    {
        $priceBeer = Carbon::createFromFormat('H:i:s', $attributes['time'])->format('H:i:s') >= Carbon::createFromFormat('H:i:s','16:00:00')->format('H:i:s') &&
            Carbon::createFromFormat('H:i:s', $attributes['time'])->format('H:i:s') <= Carbon::createFromFormat('H:i:s','17:59:00')->format('H:i:s') ? 290 : 490;
        $firstBeerPrice = $attributes['is_voucher'] == BaseEnum::HAVE_VOUCHER ? 100 : $priceBeer;
        return $firstBeerPrice + $priceBeer * ($attributes['amount'] - 1);
    }

    public function handledDiscountProduct($data)
    {
        $isShirt = false;
        $isTie = false;
        $total = 0;
        foreach ($data as $datum){
            if ($datum['product_type'] == BaseEnum::SHIRT){
                $isShirt = true;
            }
            if ($datum['product_type'] == BaseEnum::TIE){
                $isTie = true;
            }
            $total += $datum['amount'];
        }
        $isSale5 = $isShirt && $isTie ? 5 : 0;
        $isSale7 = $total >= 7 ? 7 : 0;
        return $isSale5 + $isSale7;
    }
}
