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
                    <th scope="col">Icon</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @if (count($services)>0)
                        @foreach ($services as $service)
                        <tr>
                            <th scope="row">{{$service->id}}</th>
                            <td>{{$service->icon}}</td>
                            <td>{{$service->title}}</td>
                            <td>{{Str::limit(strip_tags($service->description),30)}}</td>
                            <td>
                              <div class="row">
                                <div class="col-sm-2">
                                  <a href="{{route('admin.services.edit',$service->id)}}" class="btn btn-primary">Edit</a>
                                </div>
                                <div class="col-sm-2">
                                  <form action="{{route('admin.services.destroy',$service->id)}}" method="post">
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
                
                