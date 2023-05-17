<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Repositories\Interface\UserRepositoryInterface;

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
        $user = $request->validated();

        if (!$this->userRepo->createUser($user)) {
            return back()->with('error', trans("'An error occurred! Please try again.'"));
        }

        auth()->login($user);

        return redirect('login')->with('success', trans("User created successfully."));
    }
}
