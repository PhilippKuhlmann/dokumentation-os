<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccesspointRequest extends FormRequest
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
    public function rules()
    {
        return [
            'room_id' => '',
            'site_id' => ['required', new \App\Rules\BelongsToCustomer('sites')],
            'name' => 'required|max:255',
            'manufacturer' => 'nullable',
            'model' => 'nullable|max:255',
            'serialNumber' => 'nullable|max:255',
            'username' => 'nullable|max:255',
            'password' => 'nullable|max:255',
            'ip' => 'required|ipv4|max:255',
            'port' => 'nullable|numeric'
        ];
    }

    public function attributes()
    {
        return [
            'site_id' => 'Standort',
            'name' => 'Name',
            'manufacturer' => 'Hersteller',
            'model' => 'Modell',
            'serialNumber' => 'Seriennummer',
            'username' => 'Benutzername',
            'password' => 'Passwort',
            'ip' => 'IP',
            'port' => 'Port',
        ];
    }
}
