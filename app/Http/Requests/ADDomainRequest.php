<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ADDomainRequest extends FormRequest
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
            'domain' => 'required|max:255',
            'netbios' => 'required|max:255',
            'dsrmpassword' => 'required|max:255',
        ];
    }

    public function attributes()
    {
        return [
            'domain' => 'Domäne',
            'netbios' => 'NETBIOS',
            'dsrmpassword' => 'DSRM Passwort',
        ];
    }
}
