<?php

namespace Learning\Rules;

use Closure;
use WPWhales\Contracts\Validation\Rule;

class UsernameExists implements Rule
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
        $status = username_exists($value);
        if($status!==false){
            return false;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The Username already exists.';
    }
}
