<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conference extends Model
{
    use HasFactory;

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'images' => 'array',
    ];

    protected $with = ['file_objects'];

    function province_table() {
        return $this->belongsTo(Province::class, 'province');
    }

    public function file_objects()
    {
        return $this->morphMany(File::class, 'parent_table');
    }
}
