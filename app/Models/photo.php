<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Support\Facades\Cache;

class photo extends Model
{
    use HasFactory;
    use HasSlug;
    protected $perPage = 9;

    //cette ligne permet de regenerer le cache lors du CRUD
    public static function boot(){
        parent::boot();
        static::created(function(){
            Cache::flush();
        });
        static::updated(function(){
            Cache::flush();
        });
        static::deleted(function(){
            Cache::flush();
        });
    }
    //fin 
    //ce code signifie il retournes les enregistrements de photos actives
    protected static function booted()
    {
        static::addGlobalScope('active',function(Builder $builder){
            $builder->where('active',true);
        });
    }
    //fin
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
    public function album(){
        return $this->belongsTo(Album::class);
    }
    public function sources(){
        return $this->hasMany(source::class);
    }
}
