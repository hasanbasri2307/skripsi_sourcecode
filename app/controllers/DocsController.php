<?php

class DocsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
        $docs = Document::all();
        return View::make('pages.admin.docs.index',compact('docs'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
        return View::make('pages.admin.docs.create');
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
            'title'=>Input::get('title'),
            'content' => Input::get('content'),
            'no_docs' => Input::get('no_docs'),
            'file' =>Input::file('file'),
        ];

        $rule = [
            'title' => 'required|max:20',
            'no_docs' => 'required|max:15',
            'content'=>'required',
            'file'=> 'required'
        ];

        $validator = Validator::make($input,$rule);
        if($validator->passes())
        {
            $file = Input::file('file');
            $filename = $file->getClientOriginalName();
            $directory = public_path().'/assets/documents/';
            $upload = $file->move($directory,$filename);

            $docs= new Document();
            $docs->no_doc = Input::get('no_docs');
            $docs->file = $filename;
            $docs->judul = Input::get('title');
            $docs->content = Input::get('content');
            $docs->save();

            return Redirect::route('admin.docs.index')
                ->withPesan('Docs Has Been Added');
        }
        else
        {
            return Redirect::back()
                ->withInput()
                ->withErrors($validator);
        }

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
        $doc = Document::find($id);
        return View::make('pages.admin.docs.view',compact('doc'));
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
        $doc = Document::find($id);
        return View::make('pages.admin.docs.edit',compact('doc'));
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

        $hiddenFile = Input::get('filehidden');
        if(!isset($hiddenFile))
        {
            $input = [
                'title'=>Input::get('title'),
                'content' => Input::get('content'),
                'no_docs' => Input::get('no_docs'),
                'file' =>Input::file('file'),
            ];


            $rule = [
                'title' => 'required|max:20',
                'no_docs' => 'required|max:15',
                'content'=>'required',
                'file'=> 'required'
            ];
        }
        else
        {
            $input = [
                'title'=>Input::get('title'),
                'content' => Input::get('content'),
                'no_docs' => Input::get('no_docs'),

            ];


            $rule = [
                'title' => 'required|max:20',
                'no_docs' => 'required|max:15',
                'content'=>'required',

            ];
        }


        $validator =Validator::make($input,$rule);
        if($validator->passes())
        {
            $file = Input::file('file');
            if(!isset($hiddenFile))
            {
                $filename = $file->getClientOriginalName();
                $directory = public_path().'/assets/documents/';
                $upload = $file->move($directory,$filename);
            }

            $doc  = Document::find($id);
            $doc->no_doc = Input::get('no_docs');
            $doc->judul = Input::get('title');
            $doc->content = Input::get('content');

            if(!isset($hiddenFile))
            {
                $doc->file = $filename;
            }

            $doc->save();

            return Redirect::route('admin.docs.index')->with('pesanSuccess','Document Has Been Updated');

        }
        else
        {
            return Redirect::back()->withInput()->withErrors($validator);
        }
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
        $doc = Document::find($id);
        if($doc->file)
        {
            $filename = $doc->file;
            $file= public_path(). "/assets/documents/".$filename;
            unlink($file);
        }

        $doc->delete();

        return Redirect::route('admin.docs.index')->with('pesanSuccess','Document Has Been Deleted');

	}

    public function getDownload($name){
        //PDF file is stored under project/public/download/info.pdf
        $file= public_path(). "/assets/documents/".$name;

        return Response::download($file);
    }

    public function fileDelete($id)
    {
        $id = Input::get('id');
        $doc= Document::find($id);
        $filename = $doc->file;
        $file= public_path(). "/assets/documents/".$filename;
        unlink($file);
        $doc->file = '';

    }


}
