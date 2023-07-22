<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function User(){
        return $this->belongsTo(User::class);
    }

    public function Transaction(){
        return $this->hasMany(Transaction::class);
    }
}
