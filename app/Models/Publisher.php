<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{

    protected $dates = ['created_at', 'updated_at'];

    use HasFactory;

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
