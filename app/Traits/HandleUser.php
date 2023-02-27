<?php

namespace App\Traits;

use App\Models\User;
use Auth;

trait HandleUser 
{
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('owner', function($query){
            $query->where('user_id',Auth::user()->id);
        });
    }

    protected static function bootHandleUser(){
        self::creating(function($model){
            $model->user_id = Auth::user()->id;
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}