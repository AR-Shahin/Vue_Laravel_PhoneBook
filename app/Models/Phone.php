<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;
    protected $fillable = ['name','email','phone'];

   public function getNameAttribute($value){
        return $this->attributes['name'] = ucfirst($value);
    }
}
