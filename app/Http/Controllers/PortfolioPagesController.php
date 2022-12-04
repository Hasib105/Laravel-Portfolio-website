<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Portfolio;

class PortfolioPagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolios=Portfolio::all();
        return view('pages.portfolios.list',compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.portfolios.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $portfolios=new Portfolio;
        
        $this->validate($request,
            ['title'=>'required|string',
            'sub_title'=>'required|string',
            'big_img'=>'required|image',
            'small_img'=>'required|image',
            'description'=>'required|string',
            'client'=>'required|string',
            'catagory'=>'required|string'

            ]);

        $portfolios->title=$request->title;
        $portfolios->sub_title=$request->sub_title;
        $portfolios->description=$request->description;
        $portfolios->client=$request->client;
        $portfolios->catagory=$request->catagory;

        $big_file=$request->file('big_img');
        Storage::putFile('public/img/',$big_file);
        $portfolios->big_img="storage/img/".$big_file->hashName();

        $small_file=$request->file('small_img');
        Storage::putFile('public/img/',$small_file);
        $portfolios->small_img="storage/img/".$small_file->hashName();

        $portfolios->save();

        return redirect()->route('admin.portfolios.create')->with('success','New Portfolio created Succesfully');
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
        $portfolios=Portfolio::find($id);
        return view('pages.portfolios.edit',compact('portfolios'));
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
        $portfolios=Portfolio::find($id);
        
        $this->validate($request,
            ['title'=>'required|string',
            'sub_title'=>'required|string',
            
            'description'=>'required|string',
            'client'=>'required|string',
            'catagory'=>'required|string'

            ]);

        $portfolios->title=$request->title;
        $portfolios->sub_title=$request->sub_title;
        $portfolios->description=$request->description;
        $portfolios->client=$request->client;
        $portfolios->catagory=$request->catagory;

        if($request->file('big_img')){
            $big_file=$request->file('big_img');
            Storage::putFile('public/img/',$big_file);
            $portfolios->big_img="storage/img/".$big_file->hashName();
        }

        if($request->file('small_img')){
            $small_file=$request->file('small_img');
            Storage::putFile('public/img/',$small_file);
            $portfolios->small_img="storage/img/".$small_file->hashName();
        }

        

        $portfolios->save();

        return redirect()->route('admin.portfolios.list')->with('success',' Portfolio updated Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $portfolios=Portfolio::find($id);
        @unlink(public_path($portfolios->big_img));
        @unlink(public_path($portfolios->small_img));
        $portfolios->delete();
        
        return redirect()->route('admin.portfolios.list')->with('success',"Portfolio Deleted Succesfully");

    }
}
