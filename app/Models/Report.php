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

    public function topic() {
        return $this->belongsTo(Topic::class, 'topic');
    }
}
