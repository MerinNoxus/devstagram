<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable=[
        'titulo',
        'descripcion',
        'imagen',
        'user_id'
        
];
public function user(){
    return $this->belongsTo(User::class)->select(['name','username']);
}
public function comentarios(){
return $this->hasMany(Comentario::class);
}
public function likes(){
    return $this->hasMany(Like::class);
}
/*
lo que hace este metodo es que se posiciona en la tabla likes y revisa 
en la columna user_id si contiene el usuario que se le pase y este relacionado
con ese post, revisa en pocas palabras si ya dio like.
*/
public function checkLike(User $user){
    return $this->likes->contains('user_id',$user->id);
}
}
