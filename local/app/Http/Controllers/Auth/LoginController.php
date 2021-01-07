<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    protected $redirectTo = '/home';
    /*public function redirectTo() {
        $type_user = Auth::user()->id_type_user; 
        // dd($type_user);
        switch ($type_user) {
            case 1:
                return '/order_today';
            break;

            case 2:
                return '/order_today';
            break;

            case 3:
                return '/order_today';
            break;

            case 4:
                return '/d-care';
            break;

            default:
                return '/order_today'; 
            break;
        }
    }*/

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
     * Create a new controller instance.
     *
     * @return void
     */
    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if (auth()->attempt(array($fieldType => $input['username'], 'password' => $input['password']))) {


            return $this->sendLoginResponse($request);

            // // return Auth::user()->id_type_user;
            // if (Auth::user()->id_type_user == 2) {

            //         return Redirect::to('order_today');
                    
            // } else {
            //     // return redirect()->route('/home');
            //     return Redirect::to('order_today');
            // }
        } else {
            return redirect()->route('login')->with('error', 'Email-Address And Password Are Wrong.');
        }
    }


}
