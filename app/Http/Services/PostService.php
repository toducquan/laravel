<?php
namespace App\Http\Services;

use App\Post;
use App\Http\Responses\PostResponse;


class PostService extends PostResponse{

    public function addNewPost($title, $content, $create_by)
    {
        Post::create(["title" => $title, "content" => $content, "created_by" => $create_by]);
    }

    public function getAllPost()
    {
        return Post::all();
    }

    public function getPostWithId($id)
    {
        return Post::find($id);
    }

    public function changePostById($id, $content)
    {
        $post = Post::find($id);
        $post->update(["content" => $content]);
    }

    public function deletePostById($id)
    {
        $post = Post::find($id);
        $post-> delete();
    }
}
