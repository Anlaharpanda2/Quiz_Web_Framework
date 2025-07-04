<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    
    protected $table = 'berita';
    protected $fillable = ['judul','konten','foto','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}