<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;

    protected $with = ['file_objects'];
    
    protected $casts = [
        'participants_list_ids' => 'array'
    ];

    public function file_objects()
    {
        return $this->morphMany(File::class, 'parent_table');
    }
}
