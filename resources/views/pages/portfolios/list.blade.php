@extends('layouts.admin_layout')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">List</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
        
        <div>
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Sub Title</th>
                    <th scope="col">Big Image</th>
                    <th scope="col">Small Image</th>
                    <th scope="col">Description</th>
                    <th scope="col">Client</th>
                    <th scope="col">Catagory</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @if (count($portfolios)>0)
                        @foreach ($portfolios as $portfolio)
                        <tr>
                            <th scope="row">{{$portfolio->id}}</th>
                            <td>{{$portfolio->title}}</td>
                            <td>{{$portfolio->sub_title}}</td>
                            <td>{{Str::limit(strip_tags($portfolio->description),30)}}</td>
                            <td><img style="height: 10vh" src="{{url($portfolio->big_img)}}" alt="big_img"></td>
                            <td><img style="height: 10vh" src="{{url($portfolio->small_img)}}" alt="small_img"></td>
                            <td>{{$portfolio->client}}</td>
                            <td>{{$portfolio->catagory}}</td>
                            <td>
                              <div class="row">
                                <div class="col-sm-4" >
                                  <a href="{{route('admin.portfolios.edit',$portfolio->id)}}" class="btn btn-primary ">Edit</a>
                                </div>
                                <div class="col-sm-4">
                                  <form action="{{route('admin.portfolios.destroy',$portfolio->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" name="submit" value="Delete" class="btn btn-danger">
                                  </form>
                                </div>
                              </div>
                            </td>
                          </tr>
                        @endforeach
                    @endif
                  
            
                </tbody>
              </table>
        </div>
</main>
@endsection
                
                