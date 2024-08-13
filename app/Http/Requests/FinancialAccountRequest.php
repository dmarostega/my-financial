<?php 
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class FinancialAccountRequest extends FormRequest 
{
    public function rules()
    {
        return [
            'financial_entity_id' => ['required'],
            'entity_number' => ['required'],
            'entity_dv' => ['required'],
            'account' => ['required'],
            'account_dv' => ['required']
        ];
    }

    public function messages(){
        return [];
    }
}
