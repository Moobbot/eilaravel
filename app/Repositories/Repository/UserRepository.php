<?php

namespace App\Repositories\Repository;

use App\Models\User;
use App\Repositories\BaseRepository;
use App\Repositories\Interface\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function __construct(User $user)
    {
        // Call __construct in BaseRepository
        parent::__construct($user);
    }

    /**
     * Call modal
     */
    public function getModel()
    {
        return \App\Models\User::class;
    }

    public function getUser($email)
    {
        return $this->model->where($email, 'email');
        // User::where('email', $email)->first();
        // return User::get(); //Nên dùng Eloquent cho chủ thể users (Liên quan đến phân quyền)
        //Phong cách query builder DB::table('users')
        // $users = User::join('departments', 'users.department_id', '=', 'departments.id')
        //     ->join('user_status', 'users.status_id', '=', 'user_status.id')
        //     ->select('users.*', 'departments.name as department_name', 'user_status.name as status_name')
        //     ->get();
        // dd($users->all());
        // return response()->json($users, 200);
    }

    public function createUser(array $attributes)
    {
        // $attributes->merge(['status' => 0]);
        // $attributes['password'] = Hash::make($attributes['password']);
        // unset($attributes['password_confirmation']);
        $attributes['status_id']  = 1;
        $attributes['department_id']  = 2;
        // dd($attributes);
        return $this->model->create($attributes);
        // $user = new User();
        // $user = User::create($validated);
    }

    public function checkLogin($request)
    {

        // dd($request);
        $user = User::whereEmail($request['email'])->first();

        //If user login first time with steam and his id is not in database redirect to email input page
        // return $user ? true : false;
        if ($user) {
            if (Hash::check($request['password'], $user['password'])) {
                // Passwords match
                // Perform the necessary actions for successful comparison
                if ($user['status_id'] == 1) {
                    $this->update($user['email'], array('login_at' => now()), "email");

                    return [true, trans("Logged in successfully")];
                } else {
                    return [false, trans("Account not activated yet! Please activate your account.")];
                }
            } else {
                // Passwords do not match
                // Handle the failed comparison
                return [false, trans("Incorrect password!")];
            }
        }
        return [false, trans("This account could not be found!")];
    }
}
