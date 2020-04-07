<?php

namespace App\Http\Requests;

use App\Device;
use Illuminate\Foundation\Http\FormRequest;

class DeviceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('create', Device::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if (strtolower($this->input('action')) === "delete") {
            return [];
        }

        return [
            'type_id' => 'required|exists:device_types,id',
            'name' => 'string|max:255',
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
