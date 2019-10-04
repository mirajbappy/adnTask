<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;

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
        $this->middleware('guest:systemadmin')->except('logout');
        $this->middleware('guest:admin')->except('logout');
        $this->middleware('guest:manager')->except('logout');
        $this->middleware('guest:customer')->except('logout');
    }


    public function login(Request $request)
    {
        $this->validateLogin($request);

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }

        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
            ]);


        if(\Auth::guard('systemadmin')->attempt(['email' => $request->email, 'password' => $request->password, 'user_type' => 'system_admin'])) {
            return redirect()->to('/dashboard/systemadmin');
        }if(\Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password, 'user_type' => 'admin'])) {
            return redirect()->to('/dashboard/admin');
        }if(\Auth::guard('manager')->attempt(['email' => $request->email, 'password' => $request->password, 'user_type' => 'manager'])) {
            return redirect()->to('/dashboard/manager');
        }if(\Auth::guard('customer')->attempt(['email' => $request->email, 'password' => $request->password, 'user_type' => 'customer'])) {
            return redirect()->to('/dashboard/customer');
        }else{
            return redirect()->back()->withInput();
            $this->incrementLoginAttempts($request);
        }

    }


    // // admin logins
    // public function showAdminLoginForm()
    // {
    //     return view('auth.login', ['url' => 'admin']);
    // }

    // public function adminLogin(Request $request)
    // {
    //     $this->validate($request, [
    //         'email'   => 'required|email',
    //         'password' => 'required|min:6'
    //     ]);

    //     if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

    //         return redirect()->intended('/admin');
    //     }
    //     return back()->withInput($request->only('email', 'remember'));
    // }

     // if($this->guard()->validate($this->credentials($request))) {
     //        if(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'is_activated' => 1])) {
     //            // return redirect()->intended('dashboard');
     //        }  else {
     //            $this->incrementLoginAttempts($request);
     //            return response()->json([
     //                'error' => 'This account is not activated.'
     //                ], 401);
     //        }
     //    } else {
     //        // dd('ok');
     //        $this->incrementLoginAttempts($request);
     //        return response()->json([
     //            'error' => 'Credentials do not match our database.'
     //            ], 401);
     //    }

}
