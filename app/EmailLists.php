<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailLists extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'title', 'filter'];

}
