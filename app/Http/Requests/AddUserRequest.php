<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Length;

class AddUserRequest extends FormRequest
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
            'name' => ['required','unique:users,name',new Length()],
            'password' => ['required',new Length()],
            'email' => ['required','unique:users,email'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'You have not entered a name',
            'name.unique' => 'Name already exist',
            'password.required' => 'You have not entered a password',
            'email.required' => 'You have not entered a email',
            'email.unique' => 'Email is already excist'
        ]
    }
}
