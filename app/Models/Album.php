<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Album extends Model
{
    use HasFactory;
    use HasSlug;
    protected $perPage = 9;
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug')
            ->doNotGenerateSlugsOnUpdate();
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function photos(){
        return $this->hasMany(photo::class);
    }
}
