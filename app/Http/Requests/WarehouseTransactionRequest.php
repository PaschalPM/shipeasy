<?php

namespace App\Http\Requests;

use App\Enums\InboundTransactionStatus;
use App\Enums\OutboundTransactionStatus;
use App\Enums\WarehouseTransactionType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class WarehouseTransactionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "item_id" => $this->method() === 'POST' ? "required|exists:items,id" : "exists:items,id",
            "transaction_type" => $this->method() === 'POST' ? ["required", Rule::enum(WarehouseTransactionType::class)] : Rule::enum(WarehouseTransactionType::class),
            "quantity" => $this->method() === 'POST' ? "required|numeric" : "numeric",
            "source_location" => "string",
            "destination_location" => "string",
            "shipping_carrier" => "string",
            "shipped_at" => "date_format:Y-m-d H:i:s",
            "received_at" => "date_format:Y-m-d H:i:s",
            "inbound_status" => Rule::enum(InboundTransactionStatus::class),
            "outbound_status" => Rule::enum(OutboundTransactionStatus::class)
        ];
    }
}
