<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    public function province() {
        return $this->belongsTo(province::class, 'province');
    }

    public function report() {
        return $this->hasMany(Testimonial::class);
    }

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'json_data' => 'array',
    ];
}
