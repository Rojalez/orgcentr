<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    use HasFactory;

    public function order() {
        return $this->belongsTo(Order::class);
    }
    
    public function category () {
        return $this->belongsTo(Category::class);
    }

    public function maker () {
        return $this->belongsTo(Maker::class);
    }
}
