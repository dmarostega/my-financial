<?php 

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CardRequest extends FormRequest 
{
    public function authorize() 
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => ['required'],
            'number' => ['required','numeric'],
            'holder_name' => ['required'],
            'flag' => ['required'],
            'security_code' => ['required','numeric']
        ];
    }

    public function withValidator($validator)
    {
        $creditTypes = collect(['credit','multiple','prepaid']);
        $validator->after(
            function($validator) use ($creditTypes){
                $data = $validator->getData();

                if($creditTypes->contains($data['type'])){
                    if(!$validator->validateNumeric('credit',$data['credit']) ){                    
                        $validator->errors()->add('credit','Invalid value format, number is required!');
                    }
                }
            }
        );
    }
}