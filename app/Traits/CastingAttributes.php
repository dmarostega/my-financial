<?php

namespace App\Traits;

use Carbon\Carbon;

trait CastingAttributes
{
    public function setDateAttribute($value)
    {
        if(!empty($value)) {
            $value = Carbon::parse($value);
        }
        $this->attributes['date'] = $value;
    }

    public function setDueDateAttribute($value)
    {
        if(!empty($value)) {
            $value = Carbon::parse($value);
        }
        $this->attributes['due_date'] = $value;
    }

    public function setDateInitAttribute($value)
    {
        if(!empty($value)) {
            $value = Carbon::parse($value);
        }
        $this->attributes['date_init'] = $value;
    }

    public function setDateEndAttribute($value)
    {
        if(!empty($value)) {
            $value = Carbon::parse($value);
        }
        $this->attributes['date_end'] = $value;
    }

    public function moneyToDatabase($value)
    {
        if(!is_numeric($value)){
            $value = preg_replace('/[^0-9,]/', '', $value);
        }

        $value = str_replace(',', '.', $value);
        
        return $value;
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