<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $touches = [
        'user'
    ];
    
    protected $fillable = [
        'title',
        'description',
        'slug'
    ];

    // Relation One to Many
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
