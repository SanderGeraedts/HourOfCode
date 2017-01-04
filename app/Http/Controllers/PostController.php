<?php
/**
 * Created by PhpStorm.
 * User: sander
 * Date: 1-1-17
 * Time: 16:26
 */

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller {

    public function getDashboard() {
        $posts = Post::orderBy('created_at', 'DESC')->get();

        return view('dashboard', ['posts' => $posts]);
    }

    public function postCreatePost(Request $request) {
        $this->validate($request, [
           'body' => 'required|max:10000' ,
            'day' => 'required|integer'
        ]);

        $post = new Post();
        $post->body = $request['body'];
        $post->day = $request['day'];

        $message = 'There was an error';
        $success = false;

        if ($request->user()->posts()->save($post)) {
            $message = 'Post successfully created!';
            $success = true;
        }

        return redirect()->route('dashboard')->with(['message' => $message, 'success' => $success]);
    }

    public function getDeletePost($post_id) {
        $post = Post::where('id', $post_id)->first();

        if (Auth::user() != $post->user) {
            return redirect()->back();
        }

        $message = "Something went wrong";
        $success = false;

        if($post->delete()) {
            $message = "Post successfully deleted";
            $success = true;
        }
        return redirect()->route('dashboard')->with(['message'=>$message, 'success'=>$success]);
    }

    public function postEditPost(Request $request) {
        $this->validate($request, [
            'day' => 'required|integer',
            'body' => 'required',
        ]);

        $post = Post::find($request['postId']);
        $post->body = $request['body'];
        $post->day = $request['day'];
        $post->update();

        return response()->json(['new_body' => $post->body], 200);
    }
}