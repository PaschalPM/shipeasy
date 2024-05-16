<?php

namespace App\Http\Controllers;

use App\Http\Resources\AccountResource;
use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AccountController extends Controller
{
    public function __construct(){
        $this->middleware('auth:sanctum')->except(['store']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accounts = User::where(['is_staff' => false])->get();
        
        return AccountResource::collection($accounts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create($validatedData);
        return response()->json($user, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $user = User::find($id);
        $this->authorize('view', $user);

        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
