<?php
namespace App\Http\Responses;

abstract class UserResponse{
    abstract protected function addNewUser($name, $password, $email);
    abstract protected function getAllUser();
    abstract protected function getUserWithId($id);
    abstract protected function deleteUserById($id);
    abstract protected function getAllPostByUser($id);
}
