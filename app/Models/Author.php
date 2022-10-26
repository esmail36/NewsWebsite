<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Author extends Authenticatable
{
    use HasFactory , HasRoles;

    public function user(){
        return $this->morphOne(User::class ,
        'actor' ,
        'actor_type' ,
        'actor_id' ,
        'id');
    }

    public function categories(){
        return $this->belongsToMany(Category::class , 
        'author_categories' , 
        'author_id' , 
        'category_id' , 
        'id' , 
        'id');
    }

    public function articles(){
        return $this->hasMany(Article::class);
    }

    protected static function boot() {
        parent::boot();
    
        static::deleting(function($author) {
            $author->user()->delete();
            // $admin->country()->delete();

        });
    }

    // Getting FullName 

    public function getFullNameAttribute()
    {
        return $this->user->first_name ." ". $this->user->last_name;
    }
    
    // Getting Image 
    
    public function getImagesAttribute()
    {
        return $this->user->image;
    }
}
