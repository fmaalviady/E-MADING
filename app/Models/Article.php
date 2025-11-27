<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $table = 'articles';
    protected $primaryKey = 'id_artikel';

    protected $fillable = [
        'judul',
        'isi',
        'tanggal',
        'id_user',
        'id_kategori',
        'foto',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_kategori');
    }

    public function likes()
    {
        return $this->hasMany(Like::class, 'id_artikel', 'id_artikel');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'id_artikel', 'id_artikel');
    }
}