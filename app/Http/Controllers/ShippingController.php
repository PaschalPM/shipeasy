<?php

namespace App\Http\Controllers;

use App\Http\Resources\WarehouseTransactionResource;
use App\Models\WarehouseTransaction;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    public function getShippingCost(Request $request)
    {
        $validatedData = $request->validate([
            'item_weight' => 'required|numeric',
        ]);

        $item_weight = $validatedData['item_weight'];
        // Determine rate / pound based on weight of item
        $rate_per_pound = $item_weight <= 500 ? 4 : 4.39;

        // Convert item weight to pounds
        $item_weight_in_pounds = $item_weight * 2.20462;

        // Determine shipping cost
        $shippingCost = $item_weight_in_pounds * $rate_per_pound;

        return response()->json([
            'item_weight' => $item_weight . ' kg',
            'rate' => "\$$rate_per_pound per pound",
            'shipping_cost' => "\$" . number_format($shippingCost, 2)
        ]);
    }

    public function trackItem(string $tracking_number)
    {
        $warehouseTransaction = WarehouseTransaction::where([
            'tracking_number' => $tracking_number
        ])->first();

        return new WarehouseTransactionResource($warehouseTransaction);
    }

}

