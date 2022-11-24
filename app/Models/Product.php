<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function category () {
        return $this->belongsTo(Category::class);
    }

    public function maker () {
        return $this->belongsTo(Maker::class);
    }

    protected $fillable = [
        'art',
        'category_id',
        'maker_id',
        'brand',
        'name',
        'price',
        'description',
        'image',
        'nalichie'
    ];
}
