<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class InventoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'unit_id' => ['required', 'integer', 'exists:unit,id'],
            'quantity' => ['required', 'integer'],
            'equipment_name' => ['required', 'string'],
            'equipment_id' => ['required', 'integer', 'exists:equipment,id'],
            'serial_number' => ['required', 'string'],
            'remarks' => ['string', 'required'],
            'department_id' => ['required', 'integer', 'exists:department,id'],
            'user' => ['required', 'string'],
            'issued_by' => ['required', 'integer', 'exists:users,id'],
            'received_by' => ['required', 'string'],
            'date_issued' => ['required', 'date'],
        ];
    }
}
