<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;

    protected $fillable = ['contenu', 'date_publication', 'utilisateur_id', 'article_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'utilisateur_id');
    }

    public function article()
    {
        return $this->belongsTo(Article::class, 'article_id');
    }
}
