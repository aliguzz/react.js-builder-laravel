<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Contracts\Hashing\Hasher as HasherContract;
use Alert;
use Hash;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;
    protected $hasher;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(HasherContract $hasher)
    {
        $this->hasher = $hasher;
        $this->middleware('guest');
    }
    public function reset(){
      
       $token = $_POST['token'];
       $fuser = \DB::table('password_resets')->where('token', $token)->first();
       if(count((array)$fuser)){
            $input = array();
            $input['password'] = Hash::make($_POST['password']);
            $input['original_password'] = $_POST['password'];
            \DB::table('users')->where('email', $fuser->email)->update($input);
            Alert::success("Password reset successfully")->autoclose(3000);
       }else{
         Alert::error("Reset Link may expired")->autoclose(3000);
       }
       return redirect('login');
    }
}
