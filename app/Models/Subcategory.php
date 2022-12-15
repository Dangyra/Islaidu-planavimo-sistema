<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Expense;

class Subcategory extends Model
{
    use HasFactory;

    protected $fillable = ['subcategory_name','date'];

    public function expense() 
    {
        return $this->hasMany(Expense::class);
    }
}
