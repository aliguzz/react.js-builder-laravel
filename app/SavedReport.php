<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SavedReport extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'id';

    protected $fillable = ['user_id','report_data','pin','allow_user','name','selected_report','created_by'];

    
}
