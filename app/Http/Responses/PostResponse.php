<?php
namespace App\Http\Responses;

abstract class PostResponse{
    abstract protected function addNewPost($title, $content, $create_by);
    abstract protected function getAllPost();
    abstract protected function getPostWithId($id);
    abstract protected function changePostById($id, $content);
    abstract protected function deletePostById($id);
}
