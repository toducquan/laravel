<?php

interface PostResponse{
    public function addNewPost($title, $content, $create_by);
    public function getAllPost();
    public function getPostWithId($id);
    public function changePostById($id, $content);
    public function deletePostById($id);
}
