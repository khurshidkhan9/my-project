<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use softDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['id', 'title', 'body', 'img_name', 'img_path'];


    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }
}
