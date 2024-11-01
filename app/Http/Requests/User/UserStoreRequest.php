<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|confirmed',
            'phone' => 'nullable|string',
            'avatar' => 'nullable|string',
            'age' => 'nullable|integer',
            'male' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            '*.required' => 'error',
            'email.unique' => 'This email is already registered on the site',
        ];
    }
}
