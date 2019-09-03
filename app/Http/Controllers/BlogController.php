<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Blog;
use App\BlogCategories;
use App\BlogComments;
use App\DbModel;
use Auth;
use View;
use DB;
use Alert;

class BlogController extends Controller {

    public function blog($slug = '') {
        if ($slug != '') {
            $cat_id = BlogCategories::where('slug', $slug)->first();
            $data['posts'] = Blog::get_cate_posts($cat_id->id);
        } else {
            $data['posts'] = DB::table('blogs')
            ->join('blog_categories', 'blogs.blog_category_id', '=', 'blog_categories.id')
            ->select('blogs.*', 'blog_categories.is_active')
            ->where('blog_categories.is_active',1)
            ->where('blogs.is_active',1)
            ->orderBy('blogs.id', 'DESC')
            ->get();
        }

        $data['recent_posts'] = Blog::recent_posts();

        $data['categories'] = BlogCategories::get_categories();
        $data['active'] = 'blog';

        return view('frontend/blog')->with($data);
    }

    public function blogDetail($slug) {

        $data['post'] = Blog::where('slug', $slug)->first();

        $data['recent_posts'] = Blog::recent_posts();

        $data['categories'] = BlogCategories::get_categories();

        if (Auth::user()) {
            $user_id = Auth::user()->id;
            $data['comments'] = BlogComments::getComments($data['post']->id);
            $data['post_likes'] = DbModel::post_likes($data['post']->id);
            $data['post_like'] = DbModel::user_post_like($user_id, $data['post']->id);
        }
        $data['active'] = 'blog';
        return view('frontend/blog_detail')->with($data);
    }

    public function post_comment() {

        $input = Input::all();
        $input['user_id'] = Auth::user()->id;
        //echo '<pre>'; print_r($input); die();
        BlogComments::create($input);
        $msg = 'Your comment has been added';
        Alert::Success($msg)->autoclose(3000);
        return $msg;
    }

    public function get_comment() {
        $input = Input::all();
        $input['user_id'] = Auth::user()->id;
        $comments = BlogComments::getComments($input['blog_id'], $input['user_id']);

        $html = '';
        foreach ($comments as $comment) {
            $date = date('d F Y', strtotime($comment->created_at));
            $html .= '<div class="cmnt-head-area">
            <div class="us-op">
                <span class="name">' . $comment->first_name . ' ' . $comment->last_name . '</span><span class="date">' . $date . '<small></small></span>

            </div>
            <div class="cmnt-head-area-cntnt">' . $comment->comment . '</div>
        </div>';
    }
    return json_encode(
        array("html" => $html,
            "total_comments" => $comments->count())
        );
}

public function like_post() {
    $input = Input::all();
    $input['user_id'] = Auth::user()->id;
    $post_action = explode(' ', $input['post_action']);
    $input['status'] = array_pop($post_action);
//echo '<pre>'; print_r($input); die();
    $exist = DbModel::user_post_like($input['user_id'], $input['blog_id']);
    if ($exist) {
        $update = DbModel::update_post_like($input);
    } else {
        $insert = DbModel::add_post_like($input);
    }

    $html = '';
    if ($input['status'] == 'Like') {
        $html .= '<i class="fa fa-thumbs-o-down"></i> Unlike';
    } else {
        $html .= '<i class="fa fa-thumbs-o-up"></i> Like';
    }

    return $html;
}

}
