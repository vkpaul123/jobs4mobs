<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\verifyEmailSocial;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        // return $request->only($this->username(), 'password');
        return ['email' => $request->{$this->username()}, 'password' => $request->password, 'status' => '1'];
    }




    /**
     * Redirect the user to the facebook authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($service)
    {
        return Socialite::driver($service)->redirect();
    }

    /**
     * Obtain the user information from facebook.
     *
     * @return Response
     */
    public function handleProviderCallback($service)
    {
        if($service == 'twitter')
            $userSocial = Socialite::driver($service)->user();
        else
            $userSocial = Socialite::driver($service)->stateless()->user();

        $findUser = User::where('email', $userSocial->email)->first();

        if($findUser) {
            Auth::login($findUser);
            return redirect(route('home'));
        }
        else {
            $user = new User;
            $userNames = explode(" ", $userSocial->name);
            if (count($userNames) == 2) {
                $user->firstname = $userNames[0];
                $user->lastname = $userNames[1];
            } else {
                $user->firstname = $userNames[0];
                $user->middlename = $userNames[1];
                $user->lastname = $userNames[2];
            }
            $user->email = $userSocial->email;
            $pass = Str::random(6);
            $user->password = bcrypt($pass);
            $user->status = 0;
            $user->verifyToken = Str::random(40);

            $user->save();

            $this->sendEmail($user, $pass);

            return redirect(route('verifyEmailFirst'));
            //Auth::login($user);
        }
        //return redirect(route('home'));
    }

    public function sendEmail($thisUser, $pass) {
        Mail::to($thisUser['email'])->send(new verifyEmailSocial($thisUser, $pass));
    }
}
