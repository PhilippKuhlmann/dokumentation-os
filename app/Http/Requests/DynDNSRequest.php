<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DynDNSRequest extends FormRequest
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
            'host' => 'max:255',
            'providor' => 'max:255',
            'username' => 'required|max:255',
            'password' => 'required|max:255',
        ];
    }

    public function attributes()
    {
        return [
            'host' => 'Host',
            'providor' => 'Anbieter',
            'username' => 'Benutzername',
            'password' => 'Passwort'
        ];
    }
}
