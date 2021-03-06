<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['title'];
//    protected $table = 'tags';
//    public $primaryKey = 'id';
//    public $timestamps = true;

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
