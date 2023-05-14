<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Gọi modal người dung
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Repositories\Users\UserRepositoryInterface;

class CustomAuthController extends Controller
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

    /** */
    public function index()
    {
        $users = $this->userRepo->getAll();

        return view('auth.login', ['test', $users]);
    }

    /** */
    public function customLogin(LoginRequest $request)
    {
        // $input = $request->all();
        // $input['password'] = bcrypt($input['password']);
        // $user = User::($input);
        // return response()->json(['success' => 'Tạo thành công'], 200);
    }

    /** */
    public function registration()
    {
        return view('auth.registration');
    }

    /** */
    public function customRegistration(RegisterRequest $request)
    {
        // $request->merge(['status' => 0]);
        $validated = $request->validated();
        $validated['password'] = bcrypt($validated['password']);
        unset($validated['password_confirmation']);
        $validated['status_id']  = 2;
        $validated['department_id']  = 2;
        // dd($validated);
        $user = new User();
        $user = User::create($validated);
        // dd($request->all());

        // The incoming request is valid...

        // Retrieve the validated input data...
        // $user->create($validated);

        // $validated = $request->validated();

        // Retrieve a portion of the validated input data...
        return back()->with('success', 'User created successfully.');
    }

    /** */
    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }

    /** */
    public function dashboard()
    {
        if (Auth::check()) {
            return view('auth.dashboard');
        }
        return redirect("login")->withSuccess('are not allowed to access');
    }

    /** */
    public function signOut()
    {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}
