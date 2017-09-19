<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Response;
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
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $remember = ($request->input('remember')) ? true : false;
        $email = $request->input('email');
        $password = $request->input('password');

        $postData = $request->all();

        $validator = Validator::make($postData, 
            [ 'email' => 'required|email' ,
              'password'  => 'required'
            ]
        );

        if($validator->fails())
        {
            return Response::json(['errors' => $validator->getMessageBag()->toArray() ] );
        }
        else
        {
            $auth = Auth::attempt(
                ['email' => $email,'password' => $password],$remember
            );

            if($auth)
            {
               return Response::json(['success' => 'Loggedin', 'redirect' => '/articles']); 
            }
            else
            {
                return Response::json([ 'errors' => ['wrong' => 'Your email password combination is wrong.' ]  ]);
            }
        }     
    }
}
