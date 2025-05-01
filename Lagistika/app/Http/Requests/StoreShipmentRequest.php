<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreShipmentRequest extends FormRequest
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
            'user_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'weight' =>'required|string|max:255',
            'size' => 'required|string|max:255',
            'yuk_olish_joyi' => 'required|string|max:255',
            'yuk_qabul_qilish_joyi' => 'required|string|max:255'
            
        ];
    }
}
