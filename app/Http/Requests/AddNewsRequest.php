<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Length;

class AddNewsRequest extends FormRequest
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
            'title' => ['required','unique:news,title',new Length()],
            'summary' => 'required',
            'content' => 'required'
        ];
    }

    public function messages()
    {
        return[
            'title.unique' => 'Title is already excist',
            'title.required' => 'You have not entered a title.',
            'summary.required' => 'You have not entered summary',
            'content.required' => 'You have not entered content'
        ];
    }
}
