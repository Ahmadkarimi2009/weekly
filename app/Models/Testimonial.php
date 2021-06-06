<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = ['image'];
    protected $with = ['report'];

    public function report() {
        return $this->belongsTo(Report::class);
    }


}
