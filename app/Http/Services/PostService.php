<?php
namespace App\Http\Services;

use App\Http\Responses\BaseResponse;
use App\Http\Responses\ResponseInterface\PostInterface;
use App\Post;
use App\Http\Responses\PostResponse;


class PostService extends BaseResponse implements PostInterface {
    function getModel()
    {
        return Post::class;
    }

    public function addNewPost($title, $content, $create_by)
    {
        Post::create(["title" => $title, "content" => $content, "created_by" => $create_by]);
    }

    public function changePostById($id, $content)
    {
        $post = Post::find($id);
        $post->update(["content" => $content]);
    }

}
