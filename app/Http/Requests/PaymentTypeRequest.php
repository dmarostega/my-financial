<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentTypeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required','string','max:191']
        ];
    }

    public function messages()
    {
        return [    
            'name.required' => ':attribute is required',
            'name.string' => 'invalid format, :attribute must be text',
            'name.max' => ':attribute must be 191 characters'
        ];
    }
}