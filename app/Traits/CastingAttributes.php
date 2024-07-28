<?php

namespace App\Traits;

use Carbon\Carbon;

trait CastingAttributes
{
    public function setDateAttribute($value)
    {
        $this->attributes['date'] = Carbon::parse($value);
    }

    public function setDueDateAttribute($value)
    {
        $this->attributes['due_date'] = Carbon::parse($value);
    }

    public function setDateInitAttribute($value)
    {
        $this->attributes['date_init'] = Carbon::parse($value);
    }

    public function setDateEndAttribute($value)
    {
        $this->attributes['date_end'] = Carbon::parse($value);
    }

    public function moneyToDatabase($value)
    {
        // Remove tudo que não é dígito ou vírgula
        $numericValue = preg_replace('/[^0-9,]/', '', $value);

        // Substitui a vírgula decimal por ponto
        $numericValue = str_replace(',', '.', $numericValue);
        
        return $numericValue;
    }

    /**
     * FIXME: Implementar migration para alterar tipo da coluna value
     *        de DOUBLE para DECIMAL, de todas tabelas.
     */
    // public function setValueAttribute($value)
    // {
    //     // dd((double)$value,    number_format((float)$value, 2, ',') ,  $this->attributes['value']) ;
    //     $this->attributes['value'] = number_format((float)$value, 2, '', '.');
    // }
}