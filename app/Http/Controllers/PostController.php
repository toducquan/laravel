<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Services\PostService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    private $postService;

    public function __construct()
    {
        $this->postService = app('PostService');
    }

    public function index()
    {
        $posts = $this->postService->getAllPost();
        return view('infor', [
            'posts' => $posts
        ]);
    }


    public function createView()
    {
        return view('createPost');
    }

    public function create(Request $request)
    {
        if(Auth::user()->can('add')){
            $this->postService->addNewPost($request->title, $request->contents, Auth::user()->id);
        }
        return redirect("/view/infor");
    }

    public function updateView($id)
    {
        $post = $this->postService->getPostWithId($id);
        if(Auth::user()->cant('update', $post)){
            return redirect('/view/infor');
        }
        return view('editPost', [
            'post' => $post
        ]);
    }

    public function update(Request $request, $id)
    {
        $post = $this->postService->getPostWithId($id);
        if(Auth::user()->can('update', $post)){
            $this->postService->changePostById($id, $request->contents);
        }
        return redirect("/view/infor");
    }


    public function destroy($id)
    {
        $post = $this->postService->getPostWithId($id);
        if(Auth::user()->cant('update', $post)){
            return redirect('/view/infor');
        }
        $this->postService->deletePostById($id);
        return back();
    }
}
