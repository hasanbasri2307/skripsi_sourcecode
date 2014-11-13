<?php

class AdminController extends \BaseController {

    public function dashboardAdmin()
    {
        return View::make('pages.admin.dashboard');
    }

    public function changePassword()
    {
        return View::make('pages.admin.change_password');
    }

    public function profile()
    {
        $user = Sentry::getUser();
        return View::make('pages.admin.profile',array('user'=>$user));
    }

    public function doChangePassword()
    {
        $input = [
            'old_password'=>Input::get('old_password'),
            'password'=> Input::get('password'),
            'password_confirmation' => Input::get('password_confirmation')
        ];

        $rules = [
            'old_password' => 'required',
            'password'=> 'required|min:5|confirmed',
            'password_confirmation' => 'required'
        ];

        $validator = Validator::make($input,$rules);
        if($validator->fails())
        {
            return Redirect::back()->withErrors($validator);
        }

        $user = Sentry::getUser();
        $id_user = $user->id;

        $user = Sentry::findUserById($id_user);
        if($user->checkPassword($input['old_password']))
        {
            $user->password = $input['password'];
            $user->save();

            return Redirect::back()->with('pesanSuccess','Password Has Been Change');
        }
        else
        {
            return Redirect::back()->with('pesanError','Old Password Doesnt Match');
        }

    }

    public function editProfile()
    {
        $user = Sentry::getUser();
        return View::make('pages.admin.edit_profile',array('user'=>$user));
    }

    public function doEditProfile()
    {
        $input = [
            'first_name' => Input::get('first_name'),
            'last_name' => Input::get('last_name')
        ];

        $rules= [
            'first_name' => 'required',
            'last_name'=> 'required'
        ];

        $validator= Validator::make($input,$rules);

        if($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $user = Sentry::getUser();
        $user->first_name = $input['first_name'];
        $user->last_name = $input['last_name'];
        $user->save();

        return Redirect::route('admin.profile')->with('pesanSuccess','Profile Has Been Change');
    }


}
