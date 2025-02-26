<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'numero'; // Définir numero comme clé primaire
    public $incrementing = false; // Désactiver l'auto-incrémentation par Laravel
    protected $keyType = 'integer'; // Définir le type

    protected $fillable = [
        'name', 
        'email', 
        'password',
        'firstname',
        'mailpro',
        'telephone',
        'fonction',
        'metier',
        'bureau',
        'last_login',
        'numero', // Assurez-vous que numero est fillable
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            // Récupère le dernier utilisateur avec le plus grand numero
            $lastUser = User::latest('numero')->first();

            // Si un utilisateur existe déjà, on incrémente, sinon on commence à 1001
            $user->numero = $lastUser ? $lastUser->numero + 1 : 1001;
        });
    }

    public function getRoleAttribute()
    {
        return $this->attributes['role'] ?? null; // Sécurisation pour éviter les erreurs si `role` est null
    }
}
