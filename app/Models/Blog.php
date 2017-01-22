<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $dates = ['deleted_at'];
    protected $fillable = ['title','image','description','slug','created_by','published'];
    protected $appends = ['short_description'];
    public function user(){
    	return $this->hasOne('App\Models\User','id','created_by');
    }


     public function getShortDescriptionAttribute()
    {
        return  substr($this->description,0,50)."...";;
    }
}
