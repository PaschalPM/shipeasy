<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Item extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];
    public function warehouse_transactions(): HasMany
    {
        return $this->hasMany(WarehouseTransaction::class);
    }
    
    public function customer(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
