<?php 
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;
use App\Traits\CastingAttributes;

class TransactionRequest extends FormRequest
{
    use CastingAttributes;

    public function authorize()
    {
        return true;
    }

    public function rules()
    {

        $valor = (string) $this->moneyToDatabase($this->value);      
         
        // trim e merge no request
        $valor = trim($valor);
        $this->merge(['value' => $valor]);
       
        return [
            'title' => ['required','string','max:191'],
            'date' => ['required','date'],
            'category_id' => ['required','exists:categories,id'],
            'payment_type_id' => ['required','exists:payment_types,id'],
            'value' => ['required', /*'numeric','regex:/^\d+(\.\d{1,2})?$/',*/  // permite até 2 casas decimais
            'min:0'],
            'status' => ['nullable','string']
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'O título é obrigatório',
            'title.max' => 'O título ultrapassou o número de caracteres permitidos',
            'title.string' => 'O título deve ser um texto válido',
            'date.required' => 'A data é obrigatória',
            'date.date' => 'A data informada não é válida',
            'category_id.required' => 'A categoria é obrigatória',
            'category_id.exists' => 'A categoria selecionada não existe',
            'payment_type_id.required' => 'O tipo de pagamento é obrigatório',
            'payment_type_id.exists' => 'O tipo de pagamento selecionado não existe',
            'value.required' => 'O valor da transação é obrigatório',
            'value.numeric' => 'O valor da transação deve ser tipo númerico',
            'value.decial' => 'O valor da transação deve ser do tipo númerico decimal',
            'status.string' => 'Formato do status detectado inválido'
        ];
    }
}