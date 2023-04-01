<?php 
namespace App\Traits;

trait CommonFIlter
{
    public function scopeWhereActualMonth($query)
    {
        return $query->whereMonth('date',date('m'));
    }

    public function scopeWhereDueDateActualMonth($query)
    {
        return $query->whereMonth('due_date',date('m'));
    }

    public function scopeIsActive($query)
    {
        return $query->where('status','active');
    }
}