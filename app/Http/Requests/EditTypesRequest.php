<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Length;

class EditTypesRequest extends FormRequest
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
            'name'=>['required','unique:types,name',new Length()]
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'You have not entered Type name',
            'name.unique'=>'Type name is already excist'
        ];
    }
}
