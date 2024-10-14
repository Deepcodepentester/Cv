<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TweetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //return false;
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
            //
                'tweet'=>'required',
                'file'=>'sometimes|image'
        ];
    }
    public function messages()
    {
             return [
            //
                'tweet'=>'A tweet must be required',
                'file'=>'file should not be empty'
        ];
    }
   
    
}
