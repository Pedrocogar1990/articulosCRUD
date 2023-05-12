<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    use HasFactory;
    
    protected $fillable=['titulo', 'contenido', 'estado', 'user_id','imagen'];
    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
