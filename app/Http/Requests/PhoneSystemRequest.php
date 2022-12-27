<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhoneSystemRequest extends FormRequest
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
            'manufacturer' => 'max:255',
            'type' => 'max:255',
            'model' => 'max:255',
            'serialNumber' => 'max:255',
            'ip1' => 'max:255',
            'ip2' => 'max:255',
            'ip3' => 'max:255',
            'port' => 'max:255',
            'username' => 'max:255',
            'password' => 'max:255',
        ];
    }
}
