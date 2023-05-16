<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Repositories\Interface\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
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
     * Display register page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.register');
    }

    /**
     * Handle account registration request
     *
     * @param RegisterRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterRequest $request)
    {
        // $user['password'] = bcrypt($user['password']);
        // $user = User::($user);
        // return response()->json(['success' => 'Tạo thành công'], 200);
        // The incoming request is valid...
        $user = $request->validated();
        // Retrieve the validated input data...
        if (!$this->userRepo->createUser($user)) {
            # code...
            return back()->with('error', trans("'An error occurred! Please try again.'"));
        }
        // Retrieve a portion of the validated input data...
        // auth()->login($user);
        return redirect('login')->with('success', trans("User created successfully."));
    }
}
