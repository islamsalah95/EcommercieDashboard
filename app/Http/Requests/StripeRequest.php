<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StripeRequest extends FormRequest
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
            //     'card'.'number' => ['required','integer'],
            //     'card'.'exp_month' => ['required','integer'],
            //     'card'.'exp_year'=>['required','integer'],
            //     'card'.'cvc' => ['required','integer'],
            //     'user_id'=> ['required','exists:App\Models\User,id'],
            //     'price'=> ['required','integer'],
           
           // 'card' =>[
                'number' => 'required',
                'exp_month' => 'required',
                'exp_year' => 'required',
                'cvc' => 'required',
          //  ]
                ];
    }
}







