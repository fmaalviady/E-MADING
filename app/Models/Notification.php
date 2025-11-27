<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = ['id_user', 'id_artikel', 'type', 'message', 'is_read'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function article()
    {
        return $this->belongsTo(Article::class, 'id_artikel', 'id_artikel');
    }
}
