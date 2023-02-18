<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'img1'=>['required','image'],
            'img2'=>['nullable','image'],
            'img3'=>['nullable','image'],
            'xl'=>['required','integer'],
            'xxl'=>['required','integer'],
            'xxxl'=>['required','integer'],
            'category_id'=> ['required','exists:App\Models\Category,id'],
    
        ];
    }
}
