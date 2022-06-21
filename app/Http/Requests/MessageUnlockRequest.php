<?php

namespace App\Http\Requests;

use App\Models\Message;
use App\Rules\EncryptedPasswordsMatchRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class MessageUnlockRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            // 'password' => 'required|exists:messages,password'
            'password' => ['required', new EncryptedPasswordsMatchRule($this->id)]
        ];
    }

    public function messages()
    {
        return [
            'password.required' => 'A password is required',
            'password.exists' => 'Invalid password',
        ];
    }

}
