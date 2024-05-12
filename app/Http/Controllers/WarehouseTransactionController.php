<?php

namespace App\Http\Controllers;

use App\Http\Requests\WarehouseTransactionRequest;
use App\Http\Resources\WarehouseTransactionResource;
use App\Models\WarehouseTransaction;
use Illuminate\Http\Request;

class WarehouseTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $warehouse_transactions = WarehouseTransaction::with('item')->get();
        return WarehouseTransactionResource::collection($warehouse_transactions);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WarehouseTransactionRequest $request)
    {
        $request->validated();
        $newWarehouseTransaction = WarehouseTransaction::create($request->safe()->all());
        return new WarehouseTransactionResource($newWarehouseTransaction);
    }

    /**
     * Display the specified resource.
     */
    public function show(WarehouseTransaction $warehouseTransaction)
    {
        return new WarehouseTransactionResource($warehouseTransaction);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WarehouseTransactionRequest $request, WarehouseTransaction $warehouseTransaction)
    {
        $request->validated();
        $warehouseTransaction->update($request->safe()->all());
        return new WarehouseTransactionResource($warehouseTransaction);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WarehouseTransaction $warehouseTransaction)
    {
        $warehouseTransaction->delete();
    }
}
