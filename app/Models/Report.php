<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $with = ['province_table'];

    public function province_table() {
        return $this->belongsTo(Province::class, 'province');
    }

    public function testimonial() {
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
