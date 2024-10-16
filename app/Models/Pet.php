<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'pet_name', 'pet_type'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
