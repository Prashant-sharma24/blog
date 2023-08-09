<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'detail', 'category_id'];

    public function category()
    {
        return $this->belongsToMany(\App\Models\Category::class, 'blog_category', 'category_id', 'blog_id')->withTimestamps();
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function setCategoryAttribute($value)
    {
        $this->attributes['category_id'] = json_encode($value);
    }

    public function getCategoryAttribute($value)
    {
        return $this->attributes['category_id'] = json_decode($value);
    }


}
