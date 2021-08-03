<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $with = ['province_table', 'activity_type_table'];

    public function province_table() {
        return $this->belongsTo(province::class, 'province');
    }

    public function testimonial() {
        return $this->hasMany(Testimonial::class);
    }

    public function activity_type_table() {
        return $this->belongsTo(EventType::class, 'event_type_id');
    }

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'json_data' => 'array',
        'images' => 'array',
    ];
}
