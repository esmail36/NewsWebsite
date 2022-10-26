<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    public function getFullNameAttribute()
    {
        return $this->user->first_name ." ". $this->user->last_name;
    }

    // Getting Image 

    public function getImagesAttribute()
    {
        return $this->user->image;
    }

    public function getEmailAttribute()
    {
        return $this->user->email;
    }

    public function getGenderAttribute()
    {
        return $this->user->gender;
    }

    public function getMobilesAttribute()
    {
        return $this->user->mobile;
    }

}
