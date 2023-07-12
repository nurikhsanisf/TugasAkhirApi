<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laptop extends Model
{
    use HasFactory;

    /**
     * filllable
     *
     * @var array
     */
    protected $fillable = [
        'company', 'product', 'typename', 'inches', 'screenresolution', 'cpu', 'ram', 'memory', 'gpu', 'opsis', 'weight', 'price'
    ];
}
