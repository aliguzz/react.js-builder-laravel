<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogComments extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'id';
    protected $fillable = ['user_id', 'blog_id', 'rating', 'comment'];

    public static function getComments($post_id, $user_id = '') {

        $query = BlogComments::join('users', 'blog_comments.user_id', '=', 'users.id')
                ->select('users.first_name', 'users.last_name', 'blog_comments.*')
                ->where('blog_id', $post_id)
                ->orderBy('blog_comments.id', 'DESC');

        if ($user_id != '') {
            $result = $query->where('user_id', $user_id)->get();
        } else {
            $result = $query->get();
        }

        return $result;
    }

}
