<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class EquipmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return false;
    }
    
    public function rules(): array
    {
        return [
            //
        ];
    }
}
