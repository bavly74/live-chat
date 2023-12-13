<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $guarded=[];
    public function fromUser(){
        return $this->belongsTo('App\Models\User','from');
    }

    public function toUser(){
        return $this->belongsTo('App\Models\User','to');
    }
    use HasFactory;
}
