<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Repositories\Interface\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
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
     * @return Renderable
     */

    public function index()
    {
        return view('auth.login');
    }

    /**
     * Handle account login request
     *
     * @param LoginRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {
        // $user = $request->all();
        $user = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        // dd($user);
        // dd(Auth::attempt($user));

        // unset($user['_token']);
        // dd($user);
        $checkEmail = $this->userRepo->checkEmail($user);
        if ($checkEmail != true) {
            # code...
            return redirect()->to('login')
                ->withErrors($checkEmail);
        } elseif (!Auth::attempt($user)) {
            dd(Auth::attempt($user));
            return redirect()->to('login')
                ->withErrors($checkEmail);
        }

        // $user = Auth::getProvider()->retrieveByCredentials($user);

        // Auth::login($user);
        // return $this->authenticated($request, $user);
        return redirect('/home');
    }

    /**
     * Handle response after user authenticated
     *
     * @param Request $request
     * @param Auth $user
     *
     * @return \Illuminate\Http\Response
     */
    protected function authenticated(Request $request, $user)
    {
        return redirect()->intended();
    }
}
