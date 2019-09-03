<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SmsTemplates extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','template_type', 'sms_type', 'title', 'is_public', 'is_active', 'content', 'user_id','project_id'];

}
