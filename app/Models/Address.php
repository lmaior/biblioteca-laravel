<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $table = 'address';
    protected $fillable = ['zipcode', 'address', 'number', 'neighborhood'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
