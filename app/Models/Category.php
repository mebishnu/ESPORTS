<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_name_eng',
        'category_name_np',
        'category_slug_eng',
        'category_slug_np',
        'category_icon',
    ];
}
