<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Repositories\Interface\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;

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
        // $user = $request->validate([
        //     'email' => ['required', 'email'],
        //     'password' => ['required'],
        // ]);
        $user = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        $checkMsg = $this->userRepo->checkLogin($user);
        // dd($checkMsg);
        if ($checkMsg[0] === true) {
            // This line retrieves the user object based on the provided credentials.
            $user = Auth::getProvider()->retrieveByCredentials($user);
            /*
                This line logs in the user by setting the user's information in the authenticated session.
                The Auth::login($user, $remember) method is responsible for performing the actual user login.
                The second argument, $request->get('remember'), is used to determine whether to remember the user's login.
                If the checkbox for "Remember Me" is checked, the value would be true, otherwise false.
            */
            Auth::login($user, $request->get('remember'));
            /*
                If the "Remember Me" option is checked, this block of code is executed.
                It likely calls a method setRememberMeExpiration() to set the expiration time for the remember me token associated with the user's login session.
                This is typically used to extend the duration of the user's session beyond the default session expiration time.
            */
            if ($request->get('remember')) {
                $this->setRememberMeExpiration($user);
            }
            /*
                After logging in the user, this line calls the authenticated() method,
                passing the request object and the authenticated user object.
                The purpose of this method is to handle the response after a user has successfully authenticated.
                This allows you to customize the behavior or redirect logic after authentication.
            */
            return $this->authenticated($request, $user);
        } else {
            // return redirect()->to('login')->withErrors(trans($checkMsg[1]));
            return back()->withErrors($checkMsg[1])->onlyInput('email');
        }
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
