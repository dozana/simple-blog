<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = ['title','description','body','image','published_at'];

    /**
     * Delete post image
     * @return void
     */
    public function deleteImage()
    {
        Storage::delete($this->image);
    }
}
