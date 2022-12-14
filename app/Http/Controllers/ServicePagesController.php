<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServicePagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services=Service::all();
        return view('pages.services.list',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.services.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $service=new Service;
        
        $this->validate($request,
            ['icon'=>'required|string',
            'title'=>'required|string',
            'description'=>'required|string']
          );

        $service->icon=$request->icon;
        $service->title=$request->title;
        $service->description=$request->description;

        $service->save();

        return redirect()->route('admin.services.create')->with('success','New services created Succesfully');
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
        $service=Service::find($id);
        return view('pages.services.edit',compact('service'));
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
        $service=Service::find($id);
        $this->validate($request,[
              'icon'=>'required|string',
              'title'=>'required|string',
              'description'=>'required|string',
        ]);

        $service->icon=$request->icon;
        $service->title=$request->title;
        $service->description=$request->description;

        $service->save();
        

        return redirect()->route('admin.services.list')->with('success','services updated Succesfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service=Service::find($id);
        $service->delete();

        return redirect()->route('admin.services.list')->with('success',"Services Deleted Succesfully");

    }
}
