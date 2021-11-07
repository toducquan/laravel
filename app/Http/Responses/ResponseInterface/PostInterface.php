<?php

namespace App\Http\Responses\ResponseInterface;

interface PostInterface{
    public function addNewPost($title, $content, $create_by);
    public function changePostById($id, $content);
}
