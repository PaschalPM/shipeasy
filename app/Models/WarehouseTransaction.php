<?php

namespace App\Models;

use App\Facades\TrackingNumberFacade;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WarehouseTransaction extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    static public function booted()
    {
        static::creating(function ($model) {
            $model->tracking_number = TrackingNumberFacade::generateTrackingNumber();
        });
    }

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }
}
