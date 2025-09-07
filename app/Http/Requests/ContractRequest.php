<?php 
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class ContractRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => ['required','max:191'],
            'value' => ['required'],
            'prediction' => ['required'],
            'date_init' => ['required','date'],
            'date_end' => ['nullable','date'],
            'status' => ['nullable','string']
        ];
    }

    public function messages()
    {
        return [];
    }
}