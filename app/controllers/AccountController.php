<?php
/**
 * Created by PhpStorm.
 * User: Hasan Basri
 * Date: 11/3/2014
 * Time: 23:00
 */

use Clientarea\Interfaces\AuthInterface;
use Clientarea\Helpers\General;

class AccountController extends BaseController implements AuthInterface {

    public function doLogin()
    {
        echo "testests";
    }

    public function doLogout() {
        
    }
    
    public function showLogin()
    {
        return View::make('pages.login');
    }
    
    public function signup()
    {
        return View::make('pages.signup');
    }
    
    public function forgotPassword()
    {
        return View::make('pages.forgot_password');
    }
    
    public function activation($email)
    {
        if(isset($email))
            $email = base64_decode ($email);
        return View::make('pages.activation',  compact('email'));
    }

    public function store()
    {
        $input = Input::all();
        $rules = [
            'fullname' =>'required|min:3|max:40',
            'email' =>'required|unique:account',
            'telp' =>'required|digits_between:5,14|numeric',
            'password'=>'required|alpha_num|min:5|confirmed',
            'password_confirmation'=>'required',
            'agree'=>'required'
        ];
        
        $validator= Validator::make($input,$rules);
        if($validator->passes())
        {
            $account = new Account();
            $account->fullname = Input::get('fullname');
            $account->email = Input::get('email');
            $account->no_telp = Input::get('telp');
            $account->password = Hash::make(Input::get('password'));
            $account->security_code = General::randomCode(5);
            $account->status_account = 0;
            $account->save();
            
            $data = [
                'name' => Input::get('fullname'),
                'username' => Input::get('email'),
                'password' => Input::get('password'),
                'activation_code' => General::randomCode(),
                'link' => base64_encode(Input::get('email')),
            ];
            
            Mail::queue('pages.email_registration',$data, function($message)
            {
                $message->from('hasanbasri2307@gmail.com', 'Laravel');
                $message->to(Input::get('email'),Input::get('fullname'))->subject('Register Account');
            });
            
            return Redirect::route('sign-up')
                    ->withPesan('<strong>Success !</strong> Check Your Email and Activation Your Account');
        }
        else
        {
            return Redirect::back()
                    ->withInput()
                    ->withErrors($validator);
        }
    }
    
    
    public function doActivation()
    {
        $input = Input::all();
        $rules = [
            'activation_code' =>'required'
        ];
        
        $validator = Validator::make($input, $rules);
        if($validator->passes())
        {
            
        }
    }

}