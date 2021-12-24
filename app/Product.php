<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    protected $fillable = ['title', 'image', 'price', 'description'];

    public function deleteImage()
    {
        Storage::delete($this->image);
    }
}
