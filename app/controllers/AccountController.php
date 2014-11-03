<?php
/**
 * Created by PhpStorm.
 * User: Hasan Basri
 * Date: 11/3/2014
 * Time: 23:00
 */

use Clientarea\Interfaces\AuthInterface;

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
    
    

}