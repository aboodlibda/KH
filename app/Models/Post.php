<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravelista\Comments\Commentable;

class Post extends Model
{
    use HasFactory , Commentable;
    protected $guarded=[];

    public function category ()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags ()
    {
        return $this->belongsToMany(Tag::class,'post_tags');
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
