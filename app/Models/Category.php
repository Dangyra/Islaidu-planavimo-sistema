<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Expense;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function expense()
    {
        return $this->hasMany(Expense::class);
    }
}
