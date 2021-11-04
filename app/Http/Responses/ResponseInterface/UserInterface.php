<?php

namespace App\Http\Responses\ResponseInterface;

interface UserInterface{
    public function addNewUser($name, $password, $email);
    public function getAllPostByUser($id);
}
