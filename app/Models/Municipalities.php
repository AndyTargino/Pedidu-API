<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipalities extends Model
{
    public $timestamps = false;

    use HasFactory;

    protected $fillable = [
        'ibge_id',
        'ibge_name',
    ];
}
