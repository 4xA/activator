<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeviceTogglesRequest extends FormRequest
{
    public function rules()
    {
        return [
            'toggles' => 'required',
        ];
    }

    public function prepareForValidation()
    {
        $toggles = $this->input('toggles') ?? [];
        foreach ($this->route('device')->toggles as $toggle) {
            if (!array_key_exists($toggle->key, $toggles)) {
                $toggles[$toggle->key] = 'off';
            }
        }
        $this->merge([
            'toggles' => $toggles
        ]);
    }
}
