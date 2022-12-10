<?php

namespace App\Http\Controllers\Auth;

use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    public function redirectTo(){
        $user = Auth::user();
        //dd($id);
        // User role
        $role = $user->getRoleNames();
        //dd($role);
        //$role = Role::findOrFail($id);
// dd( $role);
        // Check user role
        switch ($role[0]) {
            case 'Admin':
                    return '/home';
                break;
            case 'Driver':
                    return '/driver';
                break;
            default:
                    return '/';
                break;
        }
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
