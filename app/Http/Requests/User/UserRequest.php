<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $id = $this->route('user');
        return [
            'name' => 'required|string|max:255',
            'email' => "required|email|string|max:255|unique:users,email,$id",
            'password' => [
                'nullable',
                'string',
                'min:6',
                'confirmed'
            ],
        ];
    }
}
