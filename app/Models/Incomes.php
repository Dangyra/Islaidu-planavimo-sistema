<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incomes extends Model
{
    use HasFactory;

    protected $fillable = ['income_title','income_date','income_amount'];

    // public function User()
    // {
    // 	return $this->hasOne('App\Models\User', 'user_id', 'id');
    // }
    public function user(){
        return $this->hasOne(User::class); 
    }
}
