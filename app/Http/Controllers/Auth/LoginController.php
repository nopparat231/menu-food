<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // public function login(Request $request)
    // {
    //     $input = $request->all();

    //     $this->validate($request, [
    //         'email' => 'required|email',
    //         'password' => 'required'
    //     ]);

    //     if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
    //         if (auth()->user()->is_admin == 1) {
    //             return redirect()->route('admin.home');
    //         } else {
    //             return redirect('MyOrders');
    //         }
    //     } else {
    //         return redirect()->route('login')->with('error', "Email หรือ Password ไม่ถูกต้อง");
    //     }
    // }

    // Line login
    public function redirectToLine()
    {
        return Socialite::driver('line')->redirect();
    }

    // Line callback
    public function handleLineCallback()
    {
        $user = Socialite::driver('line')->user();

        $this->_registerOrLoginUser($user);

        // Return home after login
        return redirect()->route('home');
    }


    protected function _registerOrLoginUser($data)
    {
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";

        if ($data->email == "") {
            $email = $data->id;
        } else {
            $email = $data->email;
        }

        if ($data->avatar == "") {
            $avatar = "https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png";
        } else {
            $avatar = $data->avatar;
        }

        $user = User::where('email', '=', $email)->first();
        if (!$user) {
            $user = new User();
            $user->name = $data->name;
            $user->email = $email;
            $user->provider_id = $data->id;
            $user->avatar = $avatar;
            $user->is_admin = '0';
            $user->save();
        }

        Auth::login($user);
    }
}
