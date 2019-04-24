<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Raza implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
     public function passes($attribute, $value)
     {
         return $value == "1" || $value == "2";
     }
    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'La raza debe ser 2 para Braford y 1 para Brangus';
    }
}
