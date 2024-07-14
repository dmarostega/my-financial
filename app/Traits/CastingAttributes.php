<?php

namespace App\Traits;

trait CastingAttributes
{
    public function setDateAttribute($value)
    {
        $this->attributes['date'] = \Carbon\Carbon::parse($value);
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