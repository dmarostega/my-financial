<?php 
namespace App\Traits;

trait CommonFIlter
{
    public function scopeWhereActualMonth($query)
    {
        return $query->whereMonth('date',date('m'));
    }

    public function scopeWhereActualYear($query)
    {
        return $query->whereYear('date',date('Y'));
    }

    public function scopeWhereDueDateActualMonth($query)
    {
        return $query->whereMonth('due_date',date('m'));
    }

    public function scopeWhereDueDateActualYear($query)
    {
        return $query->whereYear('due_date',date('Y'));
    }

    public function scopeIsActive($query)
    {
        return $query->where('status','active');
    }
}