<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'email',
        'position',
        'departement',
        'hire_date',
        'salary',
        'statut',
    ];

    // Si tu as des dates, tu peux définir la propriété `$dates`
    protected $dates = [
        'hire_date',
        'created_at',
        'updated_at',
    ];
}
