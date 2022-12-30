<?php

namespace App\Http\Controllers\auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ApplicantAccount;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    //Google
    public function redirectToGoogle(){
        Session::put('url', url()->previous());

        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback(){
        $user = Socialite::driver('google')->user(); 
        
        $this->registerOrLoginApplicant($user);

        if(session()->get('key') == "http://localhost:8000/"){
            
            return redirect('/')->with('message', 'You are now logged in!');
        }else if(session()->get('key') == "http://localhost:8000/job-offers"){
            
            return redirect('/job-offers')->with('message', 'You are now logged in!');
        }else{
            return redirect('/')->with('message', 'You are now logged in!');
        }
    }
    //Facebook
    public function redirectToFacebook(){
        
        $previous = url()->previous();
        Session::put('key', $previous);

        return Socialite::driver('facebook')->redirect();
    }
    public function handleFacebookCallback(){
        $user = Socialite::driver('facebook')->stateless()->user(); 
    
        $this->registerOrLoginApplicant($user);
        
        if(session()->get('key') == "http://localhost:8000/"){
            
            return redirect('/')->with('message', 'You are now logged in!');
        }else if(session()->get('key') == "http://localhost:8000/job-offers"){
            
            return redirect('/job-offers')->with('message', 'You are now logged in!');
        }else{
            return redirect('/')->with('message', 'You are now logged in!');
        }
    }
    //Linkedin
    public function redirectToLinkedin(){
        Session::put('url', url()->previous());
        
        return Socialite::driver('linkedin')->redirect();
    }
    public function handleLinkedinCallback(){
        $user = Socialite::driver('linkedin')->user(); 

        $this->registerOrLoginApplicant($user);

        if(session()->get('key') == "http://localhost:8000/"){
            
            return redirect('/')->with('message', 'You are now logged in!');
        }else if(session()->get('key') == "http://localhost:8000/job-offers"){
            
            return redirect('/job-offers')->with('message', 'You are now logged in!');
        }else{
            return redirect('/')->with('message', 'You are now logged in!');
        }
    }

    protected function registerOrLoginApplicant($data){
        
        $user = User::where('email', $data->getEmail())->first();
        $url = session()->get('url');
        if($user){

            Auth::login($user, true);

            if($url == "http://localhost:8000/job-offers"){
                Auth::login($user, true);
               
                return redirect('job-application')->with('message', 'You are now logged in!');
            }else{
                Auth::login($user, true);
              
                return redirect('/');
            }
             

        }else{
            $newUser = User::create([
                'name' => $data->getName(),
                'email' => $data->getEmail(),
                'provider_id' => $data->getId(),
           ]);
           Auth::login($newUser, true);
        }
        
        
    }
}
