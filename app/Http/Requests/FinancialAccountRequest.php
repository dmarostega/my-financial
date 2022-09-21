<?php 
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class FinancialAccountRequest extends FormRequest 
{
    public function rules()
    {
        return [];
    }

    public function messages(){
        return [];
    }
}
