<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Http\Resources\ItemResource;
use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        Gate::authorize('viewAny', Item::class);
        $items = Item::with('warehouse_transactions')->get();
        return ItemResource::collection($items);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ItemRequest $itemRequest)
    {
        Gate::authorize('create', Item::class);
        $itemRequest->validated();
        $item = Item::create($itemRequest->safe()->all());
        return new ItemResource($item);
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        Gate::authorize('view', $item);
        return response()->json($item);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ItemRequest $itemRequest, Item $item)
    {
        $itemRequest->validated();
        $item->update($itemRequest->safe()->all());
        return new ItemResource($item);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();
    }
}
