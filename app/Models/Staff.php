<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    public function file_objects()
    {
        return $this->morphMany(File::class, 'parent_table');
    }
}
