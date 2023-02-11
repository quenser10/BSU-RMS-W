<?php

namespace App\Http\Controllers\Auth;

use App\Models\AdminAccount;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\ApplicantAccount;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


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

    use AuthenticatesUsers, ThrottlesLogins; 

    protected $maxLoginAttempts=3;
    protected $lockoutTime=300;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::DASHBOARD;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        
    }

    public function adminLogin(Request $request){

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }
        
        $validator = $request->validate( [
            'employee_id' => 'required',
            'password' => 'required',
        ]);


        if(auth()->guard('admin')->attempt($validator))
        {  

            if (auth()->guard('admin')->user()->is_admin == 1) {  

                $user = auth()->guard('admin')->user();
               
                $admin = AdminAccount::where('employee_id', $request->employee_id);
               
                $request->session()->regenerate();
                $this->clearLoginAttempts($request);

                
                return redirect('/dashboard');
            }
        }else{
            $this->incrementLoginAttempts($request);
            
            return redirect()->route('admin.login-page')
                ->withErrors(['employee_id' => 'Invalid Credentials']);
        } 

        return Redirect::back()->withErrors(['employee_id' => 'Invalid Credentials'], 'loginErrors')->onlyInput('employee_id');

    }

    protected function guard()
    {
    return Auth::guard('admin');
    }

    

    protected function sendLockoutResponse(Request $request)
{
    $seconds = $this->limiter()->availableIn(
        $this->throttleKey($request)
    );

    throw ValidationException::withMessages([
        'throttle' => [Lang::get('auth.throttle', ['seconds' => $seconds])],
    ])->status(Response::HTTP_TOO_MANY_REQUESTS);
}

    protected function authenticated(Request $request, $admin){

        Auth::logoutOtherDevices(request('password'));

        return redirect('/dashboard');
    }

    public function adminLogout(){
        auth('admin')->logout();

        return redirect('/');
    }
    
}
