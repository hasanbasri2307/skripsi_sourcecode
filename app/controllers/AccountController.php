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
       
       $input = [
           'email' => Input::get('email'),
           'password' =>  Input::get('password')
       ];
       $rules = [
           'email' => 'required|email',
           'password' =>'required'
       ];
       
       $validator = Validator::make($input,$rules);
       if($validator->passes())
       {
           try
           {
               $user = Sentry::authenticate($input,false);
               
               $admin = Sentry::findGroupByName('admin');
               $client = Sentry::findGroupByName('client');
               $cso = Sentry::findGroupByName('cso');
               
               if ($user->inGroup($admin)) {
                    return Redirect::intended('/admin/dashboard');
                } else if ($user->inGroup($client)) {
                    return Redirect::intended('/client/dashboard');
                } else if ($user->inGroup($cso)) {
                    return Redirect::intended('/cso/dashboard');
                }
            } 
           catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
            {
               return Redirect::back()
                       ->with('pesanError','Login field is required.');
                
            }
            catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
            {
                return Redirect::back()
                       ->with('pesanError','Password field is required.');
              
            }
            catch (Cartalyst\Sentry\Users\WrongPasswordException $e)
            {
                return Redirect::back()
                       ->with('pesanError','Wrong password, try again..');
               
            }
            catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
            {
                return Redirect::back()
                       ->with('pesanError','User was not found.');
                
            }
            catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
            {
                return Redirect::back()
                       ->with('pesanError','User is not activated.');
               
            }

            // The following is only required if the throttling is enabled
            catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e)
            {
                return Redirect::back()
                       ->with('pesanError','User is suspended.');
               
            }
            catch (Cartalyst\Sentry\Throttling\UserBannedException $e)
            {
                return Redirect::back()
                       ->with('pesanError','User is banned.');
               
            }
       }
       else
       {
           return Redirect::back()
                   ->withErrors($validator)
                   ->withInput();
       }
       
    }

    public function doLogout() {
        Sentry::logout();
        return Redirect::to('/')
                ->with('pesanSuccess','Logout Success');
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
            'email' =>'required|unique:users,email,:id',
            'telp' =>'required|digits_between:5,14|numeric',
            'password'=>'required|alpha_num|min:5|confirmed',
            'password_confirmation'=>'required',
            'agree'=>'required'
        ];
        
        $validator= Validator::make($input,$rules);
        if($validator->passes())
        {
            $user = Sentry::register(array(
                'email' => Input::get('email'),
                'password' => Input::get('password'),
                'first_name' => Input::get('fullname')
            ),false);
            
            $clientGroup = Sentry::findGroupByName('client');
            $user->addGroup($clientGroup);
            
            $account = new Account();
            $account->fullname = Input::get('fullname');
            $account->telp = Input::get('telp');
            $account->security_code = General::randomCode(5);
            $account->id_users = $user->id;
            $account->save();
            
            $data = [
                'name' => Input::get('fullname'),
                'username' => Input::get('email'),
                'password' => Input::get('password'),
                'activation_code' => $user->getActivationCode(),
                'link' => base64_encode(Input::get('email')),
            ];
            
            Mail::queue('pages.email_registration',$data, function($message)
            {
                $message->from('hasanbasri2307@gmail.com', 'Laravel');
                $message->to(Input::get('email'),Input::get('fullname'))->subject('Register Account');
            });
            
            return Redirect::route('sign-up')
                    ->with('pesanSuccess','<strong>Success !</strong> Check Your Email and Activation Your Account');
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
            try 
            {
                $user = Sentry::findUserByLogin(Input::get('email'));
                $user->attemptActivation(Input::get('activation_code'));
                
            } catch (UserAlreadyActivatedException $e) {
                return Redirect::to('/')->with('pesanError', $e->getMessage());
            } catch (UserNotFoundException $e)  {
                return Redirect::to('/')->with('pesanError', $e->getMessage());
            }

            return Redirect::to('/')
                ->with('pesanSuccess', 'Your Account Has Been Actived, Please Sign In');
        }
    }
    
    public function resetPassword()
    {
        try
        {
            $user = Sentry::findUserByLogin(Input::get('email'));
            if($user->checkResetPasswordCode(Input::get('resetCode')))
            {
                return View::make('pages.resetPassword')->with('email',$user->email)
                        ->with('resetCode',Input::get('resetCode'));
            }
            else
            {
                return Redirect::to('/')->with('pesanError','Reset Code Doesnt Match');
            }
        } catch (UserNotFoundException $ex) {
              return Redirect::to('/')->with('pesanError',$ex->getMessage());
        }
    }
    
    public function resetPasswordProcess()
    {
        try
        {
            $user = Sentry::findUserByLogin(Input::get('email'));
            if($user->checkResetPasswordCode(Input::get('resetCode')))
            {
                $rules = [
                    'password' =>'confirmed|required|min:5',
                    'password_confirmation' =>'required'
                ];

                $validator = Validator::make($data=Input::all(),$rules);
                if($validator->passes())
                {
                    $user->attemptResetPassword(Input::get('resetCode'),Input::get('password'));
                    
                    return Redirect::to('/')
                            ->with('pesanSuccess','Password Has Been Changed');
                }
                else
                {
                    return Redirect::back()
                            ->withErrors($validator)
                            ->withInput();
                }
            }
            else
            {
                return Redirect::to('/')
                        ->with('pesanError','Reset Code Doesnt Match');
            }
        } catch (Cartalyst\Sentry\Users\UserNotFoundException $ex) {
                 return Redirect::to('/')
                        ->with('pesanError',$ex->getMessage());
        }
    }
    
    public function sendResetLink()
    {
        $input= Input::all();
        $rules = [
            'email' =>'required|exists:users'
        ];
        
        $validator = Validator::make($input,$rules);
        if($validator->passes())
        {
            $user = Sentry::findUserByLogin(Input::get('email'));
            $data = [
                'email'=> $user->email,
                'resetCode' => $user->getResetPasswordCode()
            ];
            
            Mail::queue('pages.email_resetPassword',$data, function($message) use ($user)
            {
                $message->from('hasanbasri2307@gmail.com', 'Laravel');
                $message->to($user->email,$user->first_name.' '.$user->last_name)->subject('Reset Password');
            });
            
            return Redirect::to('/')->with('pesanSuccess','Please Check Your Email "'.($user->email).'" to Reset Your Password');
            
        }
        else
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }
    }

}