<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $with = ['file_objects', 'to_province_table', 'from_province_table'];

    protected $casts = ['staff_ids'];
    
    public function file_objects()
    {
        return $this->morphMany(File::class, 'parent_table');
    }

    public function from_province_table() {
        return $this->belongsTo(Province::class, 'from_province_id');
    }

    public function to_province_table() {
        return $this->belongsTo(Province::class, 'to_province_id');
    }
}
