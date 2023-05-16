<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\Interface\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * @var UserRepositoryInterface|\App\Repositories\Repository
     */
    protected $userRepo;

    /** */
    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function index()
    {
        $users = $this->userRepo->all();

        return view('auth.login', ['test', $users]);
    }

    public function show($id)
    {
        // return User::findOrFail($id);
        $users = $this->userRepo->find($id);

        return view('auth.dashboard', ['users' => $users]);
    }

    public function store(Request $request)
    {
        // Validate and store the blog post...
        // $validated = $request->validate(
        //     [
        //         "name" => "required",
        //         "email" => "required",
        //         "phone" => "required",
        //         "password" => "required"
        //     ],
        //     [
        //         "name.required" => "Họ tên không được để trống",
        //         "email.required" => "Email không được để trống",
        //         "phone.required" => "Số điện thoại không được để trống",
        //         "password.required" => "Mật khẩu không được để trống"
        //     ]
        // );
        $data = $request->all();

        //... Validation here

        $product = $this->userRepo->create($data);

        return view('auth.login');

        // $users_status = DB::table("user_status")->get();
        // $departments = DB::table("departments")->get();
        // return response()->json([
        //     "user_status" => $users_status,
        //     "departments" => $departments
        // ]);
    }
    public function update(Request $request, $id)
    {
        $data = $request->all();

        //... Validation here

        $product = $this->userRepo->update($id, $data);

        return view('admin.user_manage');
    }

    public function destroy($id)
    {
        $this->userRepo->delete($id);

        return view('admin.user_manage');
    }
}
