<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function authenticated(Request $request, $user)
    {
        toast("Bienvenido/a {$user->name}", 'info', 'top');
        return redirect()->route('index');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        toast('Se ha cerrado la sesión.', 'info', 'top');
        return redirect()->route('index');
    }

    protected function buildFailedValidationResponse(Request $request, array $errors)
    {
        toast('Verifique sus credenciales.', 'error', 'top');
    }
}
