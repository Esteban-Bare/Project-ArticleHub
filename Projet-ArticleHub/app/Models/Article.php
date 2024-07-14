<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['titre', 'contenu', 'date_publication', 'utilisateur_id', 'small_description'];

    public function user()
    {
        return $this->belongsTo(User::class, 'utilisateur_id');
    }

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class, 'article_id');
    }

    public function likes()
    {
        return $this->hasMany(Like::class, 'article_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'article_category', 'article_id', 'category_id');
    }
}

