<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CameraRequest extends FormRequest
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
            'name' => 'required',
            'manufacturer' => '',
            'model' => '',
            'serialNumber' => '',
            'ip' => 'required|ipv4',
            'port' => 'required',
            'username' => '',
            'password' => '',
        ];
    }

    public function attributes()
    {
        return [
            'site_id' => 'Standort',
            'name' => 'Name',
            'manufacturer' => 'Hersteller',
            'model' => 'Model',
            'serialNumber' => 'Seriennummer',
            'ip' => 'IP',
            'port' => 'Port',
            'username' => 'Benutzername',
            'password' => 'Passwort',
        ];
    }
}
