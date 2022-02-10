<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model{

    /* No seria necesario automaticamente hara el plural para el nombre de la tabla.
    protected $table = 'posts'; */

    protected $fillable = [
        'titulo',
        'extracto',
        'contenido',
        'caducable',
        'comentable',
        'acceso',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
