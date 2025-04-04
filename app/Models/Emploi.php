<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emploi extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'requirements',
        'salary_range',
        'location',
        'department',
        'statut',
        'recruiter_id',
        'deadline',
    ];
    protected $dates = [
        'deadline',
        'created_at',
        'updated_at',
    ];
}