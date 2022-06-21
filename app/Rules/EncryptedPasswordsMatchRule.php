<?php

namespace App\Rules;

use App\Models\Message;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class EncryptedPasswordsMatchRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */

    public $id;
    public function __construct($id)
    {
        $this->id = $id;
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
        // get message from database
        $message = Message::findOrFail($this->id);

        // check input value with hashed value in database
        return Hash::check($value, $message->password);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {

        return ':attribute incorrect';
    }
}
