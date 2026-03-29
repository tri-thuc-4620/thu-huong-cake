<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        switch ($this->method()) {
            case 'GET':
            case 'DELETE':
                return [];
            case 'POST':
                return [
                    'customer_name' => 'required|string|max:255',
                    'customer_phone' => 'required|string|max:20',
                    'customer_email' => 'nullable|email|max:255',
                    'delivery_type' => 'nullable|string',
                    'delivery_address' => 'nullable|string|max:500',
                    'pickup_store_id' => 'nullable|exists:store_locations,id',
                    'delivery_date' => 'nullable|date',
                    'delivery_time' => 'nullable|string',
                    'note' => 'nullable|string',
                    'shipping_fee' => 'nullable|numeric|min:0',
                    'discount' => 'nullable|numeric|min:0',
                    'payment_method' => 'nullable|string',
                    'items' => 'required|array|min:1',
                    'items.*.product_id' => 'required|exists:products,id',
                    'items.*.quantity' => 'required|integer|min:1',
                ];
            case 'PUT':
                return [
                    'customer_name' => 'required|string|max:255',
                    'customer_phone' => 'required|string|max:20',
                    'customer_email' => 'nullable|email|max:255',
                ];
            default:
                return [];
        }
    }
}
