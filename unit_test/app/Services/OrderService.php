<?php

namespace App\Services;

use App\Enum\BaseEnum;
use Carbon\Carbon;

class OrderService
{
     public function createOrderBeer($attributes)
     {
         $orderTime = Carbon::createFromFormat('H:i:s', $attributes['time'])->format('H:i:s');
         $startTimeSale = Carbon::createFromFormat('H:i:s','16:00:00')->format('H:i:s');
         $endTimeSale = Carbon::createFromFormat('H:i:s','17:59:00')->format('H:i:s');
         $priceBeer = $orderTime >= $startTimeSale && $orderTime <= $endTimeSale ? 290 : 490;
         $firstBeerPrice = $attributes['is_voucher'] == BaseEnum::HAVE_VOUCHER ? 100 : $priceBeer;
         return $firstBeerPrice + $priceBeer * ($attributes['amount'] - 1);
     }
}
