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
            'value' => ['required','numeric'],
            'prediction' => ['required','numeric'],
            'date_init' => ['required','date'],
            'date_end' => ['nullable','date']
        ];
    }

    public function messages()
    {
        return [];
    }
}