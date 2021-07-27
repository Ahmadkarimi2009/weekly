<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $with = ['parent_category', 'child_category'];

    protected $fillable = ['path', 'name', 'parent_category_id', 'child_category_id'];

    public function parent_table()
    {
        return $this->morphTo();
    }

    public function parent_category() {
        return $this->belongsTo(Category::class, 'parent_category_id');
    }

    public function child_category() {
        return $this->belongsTo(Category::class, 'child_category_id');
    }
}
