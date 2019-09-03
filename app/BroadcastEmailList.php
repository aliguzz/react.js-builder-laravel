<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BroadcastEmailList extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['email_template_id', 'email', 'is_send', 'sending_datetime', 'id'];

}
