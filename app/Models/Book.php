<?php

namespace App\Models;

use App\Models\Author;
use App\Models\Publisher;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{

    //const UPDATED_AT = null;

    protected $fillable = ['title', 'description', 'pages', 'release_date', 'image']; // aqui também pode ser usado o "protected $guarded = []" que permite atualizar tudo utilizando o update($request->all) no controller
    protected $dates = ['created_at', 'updated_at', 'release_date'];

    use HasFactory;

    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }
}
