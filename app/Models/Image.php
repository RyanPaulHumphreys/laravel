<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'src', //the path you uploaded the image
        'mime_type',
        'description',
        'alt',
      ];
    
    public function post()
    {
      return $this->belongsTo(Post::class);
    }
}
