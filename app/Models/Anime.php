<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anime extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'imagem', 'episodios', 'status', 'estreia', 'musicas'];

    protected $casts = [
        'musicas' => 'array'
    ];
}


