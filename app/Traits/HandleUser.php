<?php

namespace App\Traits;

use App\Models\User;
trait HandleUser 
{
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('owner', function($query){
            $query->where('user_id', auth()->user()->id);
        });
    }

    protected static function bootHandleUser(){
        self::creating(function($model){
            if(!$model->user_id){
                $model->user_id = auth()->user()->id;
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}