<?php

namespace App\Http\Controllers\Employer\Auth;

use App\Employer;
use App\Http\Controllers\Controller;
use App\Mail\verifyEmployerEmail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
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
    protected $redirectTo = '/employer/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:employer');
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
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'companyname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:employers',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = Employer::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'companyname' => $data['companyname'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
             'verifyToken' => Str::random(40)
        ]);

        $thisUser = Employer::findOrFail($user->id);

        $this->sendEmail($thisUser);

        return $user;
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('Employer.auth.register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        // $this->guard()->login($user);
        return redirect(route('verifyEmailFirst'));

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('employer');
    }

    public function sendEmail($thisUser) {
        Mail::to($thisUser['email'])->send(new verifyEmployerEmail($thisUser));
    }

    public function sendEmailDone($email, $verifyToken)
    {
        $user = Employer::where(['email' => $email, 'verifyToken' => $verifyToken])->first();

        if($user) {
            Employer::where(['email' => $email, 'verifyToken' => $verifyToken])
            ->update(['status' => '1', 'verifyToken' => NULL]);
            
            Session::flash('message', 'Account Activated Successfully!');
            return redirect(route('employer.login'));
        }
        else {
            return redirect(route('invalidToken'));
        }
    }
}
