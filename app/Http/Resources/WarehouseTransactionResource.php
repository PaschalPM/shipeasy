<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WarehouseTransactionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'item' => new ItemResource($this->item),
            "transaction_type" => $this->transaction_type,
            "quantity" => $this->quantity,
            "source_location" => $this->source_location,
            "destination_location" => $this->destination_location,
            "shipping_carrier" => $this->shipping_carrier,
            "tracking_number" => $this->tracking_number,
            "shipped_at" => $this->when($this->transaction_type === 'Outbound', $this->shipped_at),
            "received_at" => $this->when($this->transaction_type === 'Inbound', $this->received_at),
            "inbound_status" => $this->when($this->transaction_type === 'Inbound', $this->inbound_status),
            "outbound_status" => $this->when($this->transaction_type === 'Outbound', $this->outbound_status),
        ];
    }
}
