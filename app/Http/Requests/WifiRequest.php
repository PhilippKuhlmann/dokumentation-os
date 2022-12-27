<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WifiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'ssid' => 'max:255',
            'password' => 'max:255',
            'vlan' => 'max:255',
            'encryption' => 'max:255',
        ];
    }
}
