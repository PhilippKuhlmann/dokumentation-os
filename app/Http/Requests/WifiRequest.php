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
            'site_id' => 'required',
            'ssid' => 'required|max:255',
            'password' => 'nullable|max:255',
            'network_id' => 'required',
            'encryption' => 'required|max:255',
        ];
    }

    public function attributes()
    {
        return [
            'site_id' => 'Standort',
            'ssid' => 'SSID',
            'password' => 'Passwort',
            'network_id' => 'Netzwerk',
            'encryption' => 'Verschlüsselung',
        ];
    }
}
