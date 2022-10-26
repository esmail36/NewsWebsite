<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
    use HasFactory , HasRoles;

    public function user(){
        return $this->morphOne(User::class , 
        'actor' , 
        'actor_type' , 
        'actor_id' , 
        'id');
    }



    protected static function boot() {
        parent::boot();
    
        static::deleting(function($admin) {
            $admin->user()->delete();
            // $admin->country()->delete();

        });
    }

    // public function country(){
    //     return $this->belongsTo(Country::class);
    // }

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
