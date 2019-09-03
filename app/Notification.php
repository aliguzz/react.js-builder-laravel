<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use File;

class Notification extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'notifications';
    
    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';
    
    /**
     * belongs To relation User
     */
    public function user()
    {
    	return $this->belongsTo(user::class)->select(['id', 'name','email']);
    }
    
    
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['from_user_id', 'to_user_id', 'title', 'params', 'read_status'];

    use SoftDeletes;
    protected $dates = ['deleted_at'];

}
