<?php

namespace App\Http\Controllers;

use App\Http\Responses\ResponseInterface\PostInterface;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Services\PostService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    private $postService;

    public function __construct(PostInterface $postService)
    {
        $this->postService = $postService;
    }

    public function index()
    {
        $posts = $this->postService->getAll();
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
        $this->postService->addNewPost($request->title, $request->contents, Auth::user()->id);
        return redirect("/view/infor");
    }

    public function updateView($id)
    {
        $post = $this->postService->find($id);
        return view('editPost', [
            'post' => $post
        ]);
    }

    public function update(Request $request, $id)
    {
        $post = $this->postService->find($id);
        if(Auth::user()->can('editPost', $post))
            $this->postService->changePostById($id, $request->contents);
        return redirect("/view/infor");
    }


    public function destroy($id)
    {
        $post = $this->postService->find($id);
        if(Auth::user()->can('editPost', $post))
            $this->postService->destroy($id);
        return back();
    }
}
