<?php
namespace App\Http\Responses;

abstract class RoleResponse{
    abstract protected function getAllRole();
    abstract protected function addNewRole($user_id, $role);
    abstract protected function deleteRole($id);
}
