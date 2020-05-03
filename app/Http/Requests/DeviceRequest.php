<?php

namespace App\Http\Requests;

use App\Device;
use Illuminate\Foundation\Http\FormRequest;

class DeviceRequest extends FormRequest
{
    protected $errorBag = 'devices';

    public function authorize()
    {
        return $this->user()->can('create', Device::class);
    }

    public function rules()
    {
        if (strtolower($this->input('action')) === "delete") {
            return [];
        }

        $validateName = function ($attribute, $value, $fail) {
            if (strtolower($value) === 'activator') {
                return $fail("You cannot run Activator from Activator. \u{1F61B}... I mean, you can but we just don't want you to anyway haha. We has jobs.");
            }
        };

        return [
            'type_id' => 'bail|required|exists:device_types,id',
            'name' => ['string', 'max:255', $validateName],
            'image' => 'image',
        ];
    }

    public function messages()
    {
        return [
            'name.string' => 'The name field is not filled.'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'device name'
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function($validator) {
            $email = strtolower($this->user()->email);
            $array = explode('@', $email);
            $domain = count($array) == 2 ? $domain = $array[1] : '';
            if ($domain === "yahoo.com") {
                $validator->errors()->add('user', 'We cannot provide this service to customers with yahoo.com emails');
            }
        });
    }
}
