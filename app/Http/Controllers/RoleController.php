<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    private $roleService;

    public function __construct()
    {
        $this->roleService = app('RoleService');
    }

    public function index(){
        $roles = $this->roleService->getAllRole();
        return view('role', [
            'roles' => $roles
        ]);
    }

    public function blockView(){
        return view('block');
    }

    public function create(Request $request){
        $this->roleService->addNewRole($request->user_id, 2);
        return redirect('/view/role');
    }
    public function destroy($id)
    {
        $this->roleService->deleteRole($id);
        return back();
    }
}
