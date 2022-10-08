<?php

namespace App\Http\Controllers\Participant\Auth;

use App\Modules\Participant\Models\Participant;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\Facades\DB;
use Session;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('front.home.login');
    }
    public function login(Request $request)
    {
        $this->validator($request);
       if(Auth::guard('participant')->attempt($request->only('phone','password'),$request->filled('remember'))){
            //Authentication passed...
           return redirect()
                ->route('participant.dashboard')
                ->with('status','You are Logged in as Participant!');
        }

        //Authentication failed...
        return $this->loginFailed();
    }

    /**
     * Logout the admin.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::guard('participant')->logout();
        return redirect()->route('participant.login')->with('status','Participant has been logged out!');
           
           
    }

    /**
     * Validate the form data.
     *
     * @param \Illuminate\Http\Request $request
     * @return
     */

        private function validator(Request $request)
    {
        //validation rules.
        $rules = [
            'phone'    => 'required|exists:participants|min:8|max:15',
            'password' => 'required|string|min:4|max:255',
            ];

        //custom validation error messages.
        $messages = [
            'phone.exists' => 'These credentials do not match our records.',
        ];

        //validate the request.
        $request->validate($rules,$messages);
    }


    /**
     * Redirect back after a failed login.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    private function loginFailed(){
        return redirect()->back()->withInput()->with('error','Login failed, please try again!');
          
    }

}
