<?php

namespace App\Http\Requests;

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
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'string|max:255'
        ];
    }

    public function messages()
    {
        return [
            'name.string' => 'The name field is not filled.'
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
