<?php

namespace App\Services;

use Illuminate\Support\Str;

class TrackingNumberService
{
    public function generateTrackingNumber()
    {
        $timestamp = now()->format('YmdHis');
        $randomChars =  strtoupper(Str::random(4));

        $trackingNumber = $timestamp . '-' . $randomChars;

        return $trackingNumber;
    }
}