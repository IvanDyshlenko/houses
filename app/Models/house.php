<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class house extends Model
{
    use HasFactory;

    protected $fillable = ["name", "price", "bedrooms", "bathrooms", "storeys", "garages"];

    protected $hidden = ["created_at", "updated_at"];

    protected $primaryKey = "id";

    protected $keyType = 'string';
}
