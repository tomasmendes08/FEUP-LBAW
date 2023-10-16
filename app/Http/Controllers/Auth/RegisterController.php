<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\ImageController;
use App\Models\User;
use App\Models\ImageUser;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;

class RegisterController extends ImageController
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    public function show(){
        return view('auth.signup');
    }

   /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|string|max:18|unique:user',
            'email' => 'required|string|email|max:255|unique:user',
            'password' => ['required', 'string', 'min:6', 'confirmed', 'regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{6,}$/'],
            'password_confirmation' => ['required', 'string', 'min:6', 'regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{6,}$/'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(Request $request)
    {
        $data = $request->all();
        $createdUser = User::create([
            'name' => $data['name'],
            'city' => $data['city'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'description' => $data['description']
        ]);

        if ($request->file('profile-pic') != null) {
            $this->addImageUser($createdUser, $request, true);
        }

        if ($request->file('header-pic') != null) {
            $this->addImageUser($createdUser, $request, false);
        }
    }

    public function signUp(Request $request){
        $valid = $this->validator($request->all());

        if($valid->fails()) return back()->withErrors($valid);

        event(new Registered($user = $this->create($request)));
        $this->guard('login');

        return redirect('/');
    }
}
