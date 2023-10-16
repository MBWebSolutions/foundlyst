<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $table = 'articles';

    public function HasUser(){
        $this->belongsTo(User::class, 'user_id');
    }
    
    public function HasCategory(){
        $this->belongsTo(Category::class, 'category_id');
    }
}
