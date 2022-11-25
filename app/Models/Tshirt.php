<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tshirt extends Model
{
    use HasFactory;

    protected $fillable = [
        'model',
        'size',
        'url_img',
        'name_img',
    ];
}
