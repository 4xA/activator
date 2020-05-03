<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Toggle implements Rule
{
    public function passes($attribute, $value)
    {
        if (!is_array($value)) {
            return false;
        }
        foreach ($value as $value) {
            if (!in_array($value, ['on', 'off', 1, 0, '1', '0'])) {
                return false;
            }
        }
        return true;
    }

    public function message()
    {
        return trans('validation.toggle');
    }
}
