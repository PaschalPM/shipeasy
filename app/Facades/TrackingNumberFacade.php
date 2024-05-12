<?php

namespace App\Facades;

use App\Services\TrackingNumberService;
use Illuminate\Support\Facades\Facade;

class TrackingNumberFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return TrackingNumberService::class;
    }
}