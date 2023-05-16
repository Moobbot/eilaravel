<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Gọi modal người dung
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Repositories\Interface\UserRepositoryInterface;

class CustomAuthController extends Controller
{
    /**
     * @var UserRepositoryInterface|\App\Repositories\Interface
     */
    protected $userRepo;

    /** */
    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    /**
     * Display login page.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('auth.login');
    }

    /** */
    public function dashboard()
    {
        // $users = $this->userRepo->all();
        // dd($users);
        // return view('auth.login', ['test', $users]);
        if (Auth::check()) {
            return view('auth.dashboard');
        }
        return redirect("login")->withSuccess('are not allowed to access');
    }
}
