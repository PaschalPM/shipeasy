<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
        return ([
            'name' => $this->method() === 'POST' ? 'required|string' : 'string',
            'description' => $this->method() === 'POST' ? 'required|string' : 'string',
            'quantity' => $this->method() === 'POST' ? 'required|numeric' : 'numeric',
            'price' => $this->method() === 'POST' ? 'required|numeric' : 'numeric',
            'weight' => $this->method() === 'POST' ? 'required|numeric' : 'numeric',
            'customer_id' => 'numeric',
        ]);
    }
}
