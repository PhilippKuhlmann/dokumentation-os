<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RadiocenterRequest extends FormRequest
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
            'site_id' => 'required',
            'frequency' => 'required',
            'channel_spacing' => 'required',
            'power' => 'nullable',
            'evaluator' => 'nullable',
            'encoder' => 'nullable',
            'receipt' => 'nullable',
            'pilot_tone' => 'required',
            'transmission_type' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'site_id' => 'Standort',
            'frequency' => 'Frequenz',
            'channel_spacing' => 'Kanalabstand',
            'power' => 'Leistung',
            'evaluator' => 'Auswerter',
            'encoder' => 'Geber',
            'receipt' => 'Quittung',
            'pilot_tone' => 'Pilotton',
            'transmission_type' => 'Übertragungsart',
        ];
    }
}
