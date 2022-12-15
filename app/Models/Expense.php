<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Subcategory;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','category_id','subcategory_id','expense_title','expense_amount','expense_date'];

    public function User()
    {
    	return $this->hasOne('App\Models\User', 'user_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }
}
