<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;


class EdiPostRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    
     public function rules()
    {
        return [
            //
        ];
    }
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'sucess'=>false,
            'error'=>true,
            'message'=> 'Erreur de validation',
            'errorslist' => $validator-> errors()

        ]));
    }
    public function messages()
    {
        return[
            'title.required'=>'un tire doit etre fourni'
        ];
    }
}
