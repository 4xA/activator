<?php

namespace App\Http\Requests;

use App\Rules\Toggle;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class DeviceTogglesRequest extends FormRequest
{
    public function authorize ()
    {
        $user = Auth::user();
        return $this->route('device')->user->id == $user->id;
    }

    public function rules ()
    {
        return [
            // 'toggles' => ['required', new Toggle],
            'toggles' => 'required|toggle',
        ];
    }

    public function prepareForValidation ()
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
