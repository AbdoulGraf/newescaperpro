<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Services\PromotionServices;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CheckPromotionDiscount extends Controller
{
    protected PromotionServices $promotionServices;

    public function __construct(PromotionServices $promotionServices)
    {
        $this->promotionServices = $promotionServices;
    }

    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'promotionCode' => 'required|string',
            'pr' => 'required|numeric',
            'ps' => 'required|numeric',
            'store' => 'required|integer',
        ]);

        $promotionCode = $request->input('promotionCode');
        $pr = $request->input('pr');
        $ps = $request->input('ps');
        $store = $request->input('store');

        $allCodes = $this->promotionServices->fetchPromotionCodes();
        $promo = $this->promotionServices->findPromotionCode($allCodes, $promotionCode);

        if (!$promo) {
            return $this->sendError("Invalid Code", 400);
        }

        try {
            $result = $this->promotionServices->calculateDiscount($pr, $ps, $promo);
            return response()->json($result);
        } catch (Exception $e) {
            // Log the exception message and code for debugging
            Log::error('Error in CheckPromotionDiscount: ' . $e->getMessage(), ['code' => $e->getCode()]);

            return $this->sendError($e->getMessage(), $e->getCode() ? $e->getCode() : 400);
        }
    }

    protected function sendError($message, $statusCode = 400)
    {
        // Ensure that the status code is a valid HTTP status code
        if (!in_array($statusCode, [400, 401, 403, 404, 422, 500])) {
            $statusCode = 400; // Default to 400 Bad Request if the code is not valid
        }
        return response()->json(["error" => $message], $statusCode);
    }

}
