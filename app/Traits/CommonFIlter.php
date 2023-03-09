<?php 
namespace App\Traits;

trait CommonFIlter
{
    public function scopeWhereActualMonth()
    {
        return $this->whereMonth('date',date('m'));
    }

    public function scopeWhereDueDateActualMonth()
    {
        return $this->whereMonth('due_date',date('m'));
    }

    public function scopeIsActive()
    {
        return $this->where('status','active');
    }
}