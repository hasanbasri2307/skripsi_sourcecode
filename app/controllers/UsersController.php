<?php

use Clientarea\Helpers\General;
class UsersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($type)
	{
		//
       if($type=='admin')
       {
           $group = Sentry::findGroupByName('admin');

           $users = Sentry::findAllUsersInGroup($group);

       }
       else if($type =='cso')
        {
            $group = Sentry::findGroupByName('cso');

            $users = Sentry::findAllUsersInGroup($group);
        }
        elseif($type =='client')
        {
            $group = Sentry::findGroupByName('client');

            $users = Sentry::findAllUsersInGroup($group);
        }

        return View::make('pages.admin.users.index',compact('users'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//

       $group = \Cartalyst\Sentry\Groups\Eloquent\Group::lists('name','id');


        return View::make('pages.admin.users.create',compact('group'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
        $input = [
            'firstname'=>Input::get('firstname'),
            'lastname' => Input::get('lastname'),
            'email' => Input::get('email'),
            'password' => Input::get('password'),
            'password_confirmation' => Input::get('password_confirmation'),
            'group'=> Input::get('group')
        ];

        $rules = [
            'firstname' => 'required|min:3|max:20',
            'lastname' => 'required|min:3|max:20',
            'email' => 'required|email|unique:users,email,:id',
            'password'=>'required|alpha_num|min:5|confirmed',
            'password_confirmation'=>'required',
            'group' =>'required'
        ];

        $validator = Validator::make($input,$rules);
        if($validator->fails())
        {
            return Redirect::back()
                ->withInput()
                ->withErrors($validator);
        }

        $user = Sentry::register(array(

            'email'    => Input::get('email'),
            'password' =>Input::get('password'),
            'first_name' => Input::get('firstname'),
            'last_name' => Input::get('lastname')
        ), true);

        $clientGroup = Sentry::findGroupById(Input::get('group'));
        $user->addGroup($clientGroup);

        if(Input::get('group')==2)
        {
            $account = new Account();
            $account->security_code = General::randomCode(5);
            $account->id_users = $user->id;
            $account->save();
        }

        if(Input::get('group')==1)
        {
            $views = 'admin';
        }
        elseif(Input::get('group')==2)
        {
            $views= 'client';
        }
        elseif(Input::get('group')==3)
        {
            $views ='cso';
        }

        return Redirect::route('admin.users.index',$views)
            ->with('pesanSuccess','User Has Been Added');

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
        $user=Sentry::findUserById($id);
        $throttle = Sentry::findThrottlerByUserId($id);

        return View::make('pages.admin.users.view',compact('user','throttle'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
        $user=Sentry::findUserById($id);
        $group = \Cartalyst\Sentry\Groups\Eloquent\Group::lists('name','id');

        return View::make('pages.admin.users.edit',compact('user','group'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
        $input = [
            'firstname' => Input::get('firstname'),
            'lastname' => Input::get('lastname'),
            'group' => Input::get('group')
        ];

        $rules = [
            'firstname' => 'required|min:3|max:20',
            'lastname' => 'required|min:3|max:20',
            'group' => 'required'
        ];
        $validator = Validator::make($input,$rules);
        if($validator->passes())
        {
            if(Input::get('group')==2)
            {
                return Redirect::back()
                    ->with("pesanError","Administrator or CSO can't Change to Client")->withInput();
            }
            else
            {
                $temp='';
                $user= Sentry::findUserById($id);
                $user->first_name = Input::get('firstname');
                $user->last_name = Input::get('lastname');
                foreach($user->getGroups() as $d)
                {
                    if($d->id != Input::get('group'))
                    {
                        $group = Sentry::findGroupById($d->id);
                        $user->removeGroup($group);
                        $new_group = Sentry::findGroupById(Input::get('group'));
                        $user->addGroup($new_group);

                    }
                    $temp= $d->name;
                }
                $user->save();

                return Redirect::route('admin.users.index',$temp)
                    ->with('pesanSuccess','User Has Been Updated');
            }
        }
        else
        {
            return Redirect::back()
                ->withInput()->withErrors($validator);
        }

	}

	public function destroy($id)
	{
		//
        $user = Sentry::findUserById($id);
        $temp= '';
        foreach($user->getGroups() as $d)
        {
          $temp = $d->name;
        }
        $user->delete();
        return Redirect::route('admin.users.index',$temp)
            ->with('pesanSuccess','User Has Been Deleted');

	}

    public function suspend($id)
    {
        $throttle = Sentry::findThrottlerByUserId($id);

        // Ban the user
        $throttle->suspend();

        return Redirect::back()->with('pesanSuccess','User Has Been Suspended');
    }

    public function unsuspend($id)
    {
        $throttle = Sentry::findThrottlerByUserId($id);

        // Ban the user
        $throttle->unsuspend();

        return Redirect::back()->with('pesanSuccess','User Has Been Unsuspend');
    }

    public function banned($id)
    {
        $throttle = Sentry::findThrottlerByUserId($id);

        // Ban the user
        $throttle->ban();

        return Redirect::back()->with('pesanSuccess','User Has Been Banned');
    }

    public function unbanned($id)
    {
        $throttle = Sentry::findThrottlerByUserId($id);

        // Ban the user
        $throttle->unban();

        return Redirect::back()->with('pesanSuccess','User Has Been Unbanned');
    }


}
