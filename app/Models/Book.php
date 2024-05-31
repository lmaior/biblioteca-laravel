<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    //const UPDATED_AT = null;

    protected $fillable = ['title', 'author', 'description', 'pages', 'release_date', 'image']; // aqui também pode ser usado o "protected $guarded = []" que permite atualizar tudo utilizando o update($request->all) no controller
    protected $dates = ['created_at', 'updated_at', 'release_date'];
    
    use HasFactory;
}
