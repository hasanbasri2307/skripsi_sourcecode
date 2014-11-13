<?php

class ReportController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
        $group = \Cartalyst\Sentry\Groups\Eloquent\Group::lists('name','id');
        $condition = [
            'active' => 'active',
            'suspend' =>'suspend',
            'banned' =>'banned'
        ];

        return View::make('pages.admin.users.report',compact('group','condition'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */

    public function printed()
    {

        $user_type = Input::get('user_type');
        $condition = Input::get('condition');
        $all = Input::get('all');

        if($condition=='active')
        {
            $field='activated';
            $i = 1;
        }
        elseif($condition=='suspend')
        {
            $field = 'suspended';
            $i = 1;
        }
        elseif($condition=='banned')
        {
            $field ='banned';
            $i = 1;
        }

        $data = compact('user_type','field','i');

        if($all=='value')
        {
            $users = DB::table('users')
                ->join('users_groups',function($join)
                {
                    $join->on('users.id','=','users_groups.user_id');

                })

                ->join('groups',function($join)
                {
                    $join->on('groups.id','=','users_groups.group_id');

                })
                ->get();
        }
        else
        {
            $users = DB::table('users')
                ->join('users_groups',function($join) use($user_type)
                {
                    $join->on('users.id','=','users_groups.user_id')
                        ->where('group_id','=',$user_type);
                })
                ->join('throttle',function($join) use($data)
                {
                    $join->on('users.id','=','throttle.user_id')
                        ->where($data['field'],'=',$data['i']);
                })
                ->join('groups',function($join)
                {
                    $join->on('groups.id','=','users_groups.group_id');

                })
                ->get();
        }

        return View::make('pages.admin.users.result',compact('users','all','condition','user_type'));
    }

    public function report_to_excel()
    {


        $user_type = Request::segment('6');
        $condition = Request::segment('5');
        $all = Request::segment('7');

        if(($condition!='0') && ($user_type!=0))
        {

            if($condition=='active')
            {
                $field='activated';
                $i = 1;
            }
            elseif($condition=='suspend')
            {
                $field = 'suspended';
                $i = 1;
            }
            elseif($condition=='banned')
            {
                $field ='banned';
                $i = 1;
            }

            $data = compact('user_type','field','i');

            $users = DB::table('users')
                ->join('users_groups',function($join) use($user_type)
                {
                    $join->on('users.id','=','users_groups.user_id')
                        ->where('group_id','=',$user_type);
                })
                ->join('throttle',function($join) use($data)
                {
                    $join->on('users.id','=','throttle.user_id')
                        ->where($data['field'],'=',$data['i']);
                })
                ->join('groups',function($join)
                {
                    $join->on('groups.id','=','users_groups.group_id');

                })
                ->get();
        }


        if($all=='value')
        {
            $users = DB::table('users')
                ->join('users_groups',function($join)
                {
                    $join->on('users.id','=','users_groups.user_id');

                })

                ->join('groups',function($join)
                {
                    $join->on('groups.id','=','users_groups.group_id');

                })
                ->get();
        }


        Excel::create('Data Users Client Area PT. Overseas Commercial Futures',function($excel) use ($users)
        {
            $excel->setTitle('Data User Cliet Area PT. OCF')
                    ->setCreator('PT Overseas Commercial Futures');

            $excel->sheet('Data Users',function($sheet) use ($users)
            {
                $row = 1;
                $sheet->row($row,array(
                    'Fullname',
                    'Email',
                    'Last Login',
                    'Active At',
                    'Group',
                    'Status'
                ));
                foreach($users as $user)
                {
                    $sheet->row(++$row,array(
                        $user->first_name.' '.$user->last_name,
                        $user->email,
                        $user->last_login,
                        $user->activated_at,
                        $user->name,
                        ($user->activated==1) ? 'Actived' : 'Unactived'

                    ));
                }
            });
        })->export('xls');



    }

    public function exportPdf()
    {

        $user_type = Request::segment('6');
        $condition = Request::segment('5');
        $all = Request::segment('7');

        if(($condition!='0') && ($user_type!=0))
        {

            if($condition=='active')
            {
                $field='activated';
                $i = 1;
            }
            elseif($condition=='suspend')
            {
                $field = 'suspended';
                $i = 1;
            }
            elseif($condition=='banned')
            {
                $field ='banned';
                $i = 1;
            }

            $data = compact('user_type','field','i');

            $users = DB::table('users')
                ->join('users_groups',function($join) use($user_type)
                {
                    $join->on('users.id','=','users_groups.user_id')
                        ->where('group_id','=',$user_type);
                })
                ->join('throttle',function($join) use($data)
                {
                    $join->on('users.id','=','throttle.user_id')
                        ->where($data['field'],'=',$data['i']);
                })
                ->join('groups',function($join)
                {
                    $join->on('groups.id','=','users_groups.group_id');

                })
                ->get();
        }


        if($all=='value')
        {
            $users = DB::table('users')
                ->join('users_groups',function($join)
                {
                    $join->on('users.id','=','users_groups.user_id');

                })

                ->join('groups',function($join)
                {
                    $join->on('groups.id','=','users_groups.group_id');

                })
                ->get();
        }

        $data['users'] = $users;
        $pdf = PDF::loadView('pages.admin.users.pdf', $data);
        return $pdf->download('user_report/'.date("Y-m-d").'.pdf');

    }




}
