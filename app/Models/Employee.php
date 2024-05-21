<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function salaries()
    {
        return $this->hasMany(Salary::class);
    }

    public function performanceReviews()
    {
        return $this->hasMany(PerformanceReview::class);
    }
}