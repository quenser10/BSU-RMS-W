<?php

namespace App\Http\Controllers\applicants;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Auth\Events\OtherDeviceLogout;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class UserController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo = '/';

    //Register User/Applicant
    public function applicantRegister(Request $request){
        
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required','confirmed','min:8',]
        ]);

        $formFields['password'] = bcrypt($formFields['password']);

        $user = User::create($formFields);
        
        auth()->login($user);

        return redirect('/')->with('message', 'User created and logged in');
    }

    public function applicantLogin(Request $request){

        $validator = $request->validate([
                'email' => ['required', 'email','exists:users'],
                'password' => 'required'
            ]);

        if(auth()->guard('web')->attempt($validator)){

                Auth::logoutOtherDevices($request->password);
            
                return redirect('/')->with('message', 'You are now logged in!');
        }

        
        return redirect('/')->withErrors(['email' => 'Invalid Credentials'], 'loginErrors')->onlyInput('email');
        
    }

    protected function authenticated() {
        if (Auth::check()) {
            return redirect()->route('/');
        } 
    }

    public function logoutApplicant(){
        
        // Log out the user
        Auth::logout();

        // Redirect the user to the login page
        return redirect('/');
    }


}
