<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $table = 'users';
    
    protected $primaryKey = "id";
    protected $keyType = 'integer';


    public $timestamps = true;
    public $incrementing = true;

    protected $fillable = [
        "first_name",
        "last_name",
        "email",
        "avatar",
        "password",
        "position",
        "created_at", //NULLABLE
        "updated_at", //NULLABLE
    ];

    protected $casts = [
        "first_name" => "string",
        "last_name" => "string",
        "email" => "string",
        "avatar" => "string",
        "password" => "string",
        "position" => "string",
        "created_at" => "datetime",
        "updated_at" => "datetime",
    ];

    protected $hidden = [
        "password"
    ];
}
