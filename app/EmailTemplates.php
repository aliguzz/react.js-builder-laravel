<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailTemplates extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','template_type', 'email_type', 'title', 'is_public', 'is_active', 'attachment', 'subject', 'content', 'user_id'];

}
