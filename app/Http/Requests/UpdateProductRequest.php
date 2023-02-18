<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
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
            'name'=>['required','max:10','string'],
            'price'=>['required','integer'],
            'desc'=>['required','string'],
            'xl'=>['required','integer'],
            'xxl'=>['required','integer'],
            'xxxl'=>['required','integer'],
            'category_id'=> ['required','exists:App\Models\Category,id'],
        ];
    }
}
