interface UserResponse{
    public function addNewUser($name, $password, $email);
    public function getAllUser();
    public function getUserWithId($id);
    public function deleteUserById($id);
}