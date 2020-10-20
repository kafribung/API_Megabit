<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'username'          => ['required', 'alpha', 'min:5', 'max:20', 'unique:users,username'],
            'fullname'          => ['required', 'string', 'min:5', 'max:20'],
            'birth_of_date'     => ['required', 'date'],
            'birth_of_place'    => ['required', 'string', 'max:20'],
            'gender'            => ['required', 'string', 'min:4', 'max:6'],
            // 'password'          => ['required', 'string'],
            'role'              => ['required', 'boolean'],
        ];
    }
}
