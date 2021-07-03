<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $with = ['province', 'category'];

    public function province() {
        return $this->belongsTo(Province::class, 'province_id');
    }

    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
