<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mou extends Model
{
    use HasFactory;

    protected $with = ['file_objects'];
    
    public function file_objects()
    {
        return $this->morphMany(File::class, 'parent_table');
    }
}
