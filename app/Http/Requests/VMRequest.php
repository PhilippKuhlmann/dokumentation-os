<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VMRequest extends FormRequest
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
            'name' => 'max:255',
            'ip1' => 'max:255',
            'ip2' => 'max:255',
            'services' => 'max:255',
            'server_operating_system_id' => '',
        ];
    }
}
