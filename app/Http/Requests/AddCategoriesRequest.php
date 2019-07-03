<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Length;

class AddCategoriesRequest extends FormRequest
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
            'name' => ['required',
            'unique:categories,name',
            new Length()]
        ];
    }

    public function messages()
    {
        return [
            //
                'name.unique' => 'Category name is already excist',
                'name.required' => 'You have not entered a category name.',
                // 'name.min' => 'Category name must have 3->100 characters',
                // 'name.max' => 'Category name must have 3->100 characeters'
        ];
    }
}
