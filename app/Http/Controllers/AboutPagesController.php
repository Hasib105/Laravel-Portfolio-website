<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\About;

class AboutPagesController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts=About::all();
        return view('pages.abouts.list',compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.abouts.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $abouts=new About;
        
        $this->validate($request,
            ['title1'=>'required|string',
            'title2'=>'required|string',
            'img'=>'required|image',
            'description'=>'required|string',
         ]);

        $abouts->title1=$request->title1;
        $abouts->title2=$request->title2;
        $abouts->description=$request->description;
        

       $file=$request->file('img');
       Storage::putFile('public/img/',$file);
       $abouts->img="storage/img/".$file->hashName();

        $abouts->save();

        return redirect()->route('admin.abouts.create')->with('success','New About created Succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $abouts=About::find($id);
        return view('pages.abouts.edit',compact('abouts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $abouts=About::find($id);
        
        $this->validate($request,
            ['title1'=>'required|string',
            'title2'=>'required|string',
             'description'=>'required|string',
            ]);

        $abouts->title1=$request->title1;
        $abouts->title2=$request->title2;
        $abouts->description=$request->description;
      

        if($request->file('img')){
            $file=$request->file('img');
            Storeage::putFile('public/img',$file);
            $abouts->file="storage/img".$file->hashName();
        }

        

        $abouts->save();

        return redirect()->route('admin.abouts.list')->with('success',' About updated Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $abouts=About::find($id);
        @unlink(public_path($abouts->img));
         $abouts->delete();
        
        return redirect()->route('admin.abouts.list')->with('success',"About Deleted Succesfully");

    }
}
