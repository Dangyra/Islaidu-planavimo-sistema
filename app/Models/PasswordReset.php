<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Expense;

class PasswordReset extends Model
{
    protected $fillable = ['user_id','reset_code'];
}
