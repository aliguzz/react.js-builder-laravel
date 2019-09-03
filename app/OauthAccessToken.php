<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OauthAccessToken extends Model
{
    /**
     * belongs To relation user
    */
    
    public function user(){ 
        return $this->belongsTo('\App\User', 'user_id');         
    }
}
