<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    // Campos a serem preenchidos na criação de um Usuário
    protected $fillable = [
        'name',
        'email',
        'phone',
        'cpf',
        'password',
        'sexo',
        'status',
        'last_access',
    ];    

     // Campos ou campo a serem ocultados na conversão do modelo para JSON
    protected $hidden = [
        'password'        
    ];    

    public function favoriteCats()
    {
        return $this->hasMany(UserFavorite::class, 'user_id', 'id');
    }
}
