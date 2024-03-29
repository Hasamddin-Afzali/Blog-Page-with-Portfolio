<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'top_category',
        'created_by',
        'created_at'
    ];

    public function topCategory()
    {
        return $this->belongsTo(Category::class, 'top_category');
    }
}
