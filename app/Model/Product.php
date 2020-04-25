<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','description', 'long_description','price','status'];

     // $product->category

    public function category()
    {
     	return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
    public function getFeaturedImageUrlAttribute()
    {
        $featuredImage = $this->images()->where('featured', true)->first();
        if (!$featuredImage)
            $featuredImage = $this->images()->first();
        if ($featuredImage) {
            return $featuredImage->url;
        }
        // default
        return '/images/default.gif';
    }
    public function getCategoryNameAttribute(){
        if ($this->category)
            return $this->category->name;
        return 'General';
    }
    public function languages(){
        return $this->belongsToMany('App\Language')
        ->withPivot('name','long_description','description');
    }
}