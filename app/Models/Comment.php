<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function visitor(){
        return $this->belongsTo(Visitor::class);
    }

    public function article(){
        return $this->belongsTo(Article::class);
    }

    public function replies(){
        return $this->hasMany(Reply::class);
    }

    public function delete()
    {
        // delete all related photos 
        $this->replies()->delete();
        // as suggested by Dirk in comment,
        // it's an uglier alternative, but faster
        // Photo::where("user_id", $this->id)->delete()

        // delete the user
        return parent::delete();
    }
}
