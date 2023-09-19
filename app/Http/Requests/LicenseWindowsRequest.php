<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LicenseWindowsRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
    {
        return [
            'operating_system_id' => '',
            'key' => 'required|max:255',
        ];
    }

    public function attributes()
    {
        return [
            'operating_system_id' => 'Betriebsystem',
            'key' => 'Key',
        ];
    }
}
