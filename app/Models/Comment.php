<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';
    protected $primaryKey = 'id_comment';

    protected $fillable = [
        'id_artikel',
        'id_user',
        'isi_comment',
        'tanggal_comment',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function article()
    {
        return $this->belongsTo(Article::class, 'id_artikel', 'id_artikel');
    }
}