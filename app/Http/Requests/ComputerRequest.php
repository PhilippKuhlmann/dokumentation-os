<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComputerRequest extends FormRequest
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
            'name' => 'required|max:255',
            'manufacturer' => 'max:255',
            'model' => 'max:255',
            'serialNumber' => 'max:255',
            'ip' => 'max:255',
            'operating_system_id' => 'required',
            'remoteID' => '',
            'remotePassword' => '',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Name',
            'manufavtuter' => 'Hersteller',
            'model' => 'Model',
            'serialNumber' => 'Seriennummer',
            'ip' => 'IP',
            'remoteID' => 'RustDesk ID',
            'remotePassword' => 'RustDesk Passwort',
        ];
    }
}
