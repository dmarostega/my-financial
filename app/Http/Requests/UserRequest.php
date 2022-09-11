<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required','string'],
            'email' => ['required','email','unique:users,email,'.$this->id]
        ];
    }

    public function messages(){
        return [
            'name.required' => ':attribute is required',
            'name.string' => ':attribute invalid format',
            'email.required' => ':attribute is required',
            'email.email' => ':attribute not is email format',
            'email.unique' => 'There is already a record with informed :attribute'
        ];
    }
}