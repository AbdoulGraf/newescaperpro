<?php

namespace App\Services;

use App\Models\Promocode;
use Carbon\Carbon;

class PromotionServices
{
    public function fetchPromotionCodes()
    {
        return Promocode::where('status', 1)
            ->orderBy('id', 'ASC')
            ->get()
            ->map(function ($item) {
                return (object)[
                    'id' => $item->id,
                    'code' => $item->promocode,
                    'discount' => $item->discount,
                    'duration' => $item->validity_period,
                    'started' => $item->start_date . " 23:59:59",
                    'store' => $item->placefor
                ];
            });
    }

    public function findPromotionCode($allCodes, $promotionCode)
    {
        return $allCodes->firstWhere('code', $promotionCode);
    }

    public function calculateDiscount($pr, $ps, $promo): array
    {
        $endDate = $promo->duration == 0 ? now()->addYears(10) : Carbon::createFromFormat('Y-m-d H:i:s', $promo->started)->addDays($promo->duration);

        if (now()->greaterThan($endDate)) {
            throw new \Exception("Promotion code expired", 422);
        }
        $totalPrice = $pr * $ps;
        $discountValue = $totalPrice * ($promo->discount / 100);
        $discountedPrice = $totalPrice - $discountValue;

        return [
            "discounted_price" => number_format($discountedPrice, 2),
            "discount_amount" => number_format($discountValue, 2),
            "rate" => $promo->discount,
            "promocode" => $promo->code,
        ];
    }
}
