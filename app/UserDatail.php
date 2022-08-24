<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDatail extends Model
{

    protected $fillable = [
        "address",
        "city",
        "province",
        "phone_number"
    ]; 
    
    public function user() {
        return $this->belongsTo('App\User');
    }
}
