@extends('layouts.admin_layout')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Main</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Main</li>
        </ol>
        
        <form action="{{route('admin.main.update')}}" method="POST" enctype="multipart/form-data">
        @csrf
        {{method_field('PUT')}}
            <div class="row">
                <div class="form-group col-md-3 mt-3">
                    <h3>Background Image</h3>
                    <img style="height: 30vh" src="{{url($main->bc_img)}}" alt="" class="img-thumbnail">
                    <input type="file" name="bc_img" id="bc_img" class="mt-3">
                </div>
                <div class="form-group col-md-4 mt-3">
                    <div class="mb-3">
                        <label for="title"><h4>Title</h4></label>
                        <input type="text" name="title" id="title" class="form-control" value="{{$main->title}}">
                    </div>
                    <div class="mb-5">
                        <label for="sub_title"><h4>Sub Title</h4></label>
                        <input type="text" name="sub_title" id="sub_title" class="form-control" value="{{$main->sub_title}}">
                    </div>
                    <div class="mb-5">
                        <h4>Upload Resume</h4>
                        <input class="mt-2" type="file" name="resume" id="resume">
                    </div>
                </div>
            </div>
                   <input type="submit" name="submit" class="btn btn-primary mt-5">
                </div>
        </form>
</main>
@endsection
                
                