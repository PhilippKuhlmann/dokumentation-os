<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RouterRequest extends FormRequest
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
            'site_id' => 'required',
            'name' => 'required|max:255',
            'type' => 'nullable|max:255',
            'serialNumber' => 'nullable|max:255',
            'username' => 'required|max:255',
            'password' => 'required|max:255',
            'ip' => 'required|ipv4|max:255',
            'port' => 'required|numeric'
        ];
    }

    public function attributes()
    {
        return [
            'site_id' => 'Standort',
            'name' => 'Name',
            'type' => 'Typ',
            'serialNumber' => 'Seriennummer',
            'username' => 'Benutzername',
            'password' => 'Passwort',
            'ip' => 'IP',
            'port' => 'Port',
        ];
    }
}
