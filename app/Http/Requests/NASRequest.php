<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NASRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'name' => 'max:255',
            'manufacturer' => 'max:255',
            'model' => 'max:255',
            'serialNumber' => 'max:255',
            'ip1' => 'max:255',
            'ip2' => 'max:255',
            'port' => 'max:255',
            'username' => 'required|max:255',
            'password' => 'required|max:255',
        ];
    }
}
