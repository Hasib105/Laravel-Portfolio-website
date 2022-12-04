@extends('layouts.admin_layout')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Create</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
        
        <form action="{{route('admin.portfolios.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            {{method_field('PUT')}}
                <div class="row">
                    <div class="form-group col-md-3 mt-3">
                        <h3>Big Image</h3>
                        <img style="height: 20vh" src="{{asset('assets/img/big_img.jpg')}}" alt="" class="img-thumbnail">
                        <input type="file" name="big_img" class="mt-3">
                    </div>
                    <div class="form-group col-md-3 mt-3">
                        <h3>Small Image</h3>
                        <img style="height: 30vh" src="{{asset('assets/img/small_img.jpg')}}" alt="" class="img-thumbnail">
                        <input type="file" name="small_img" class="mt-3">
                    </div>
                    <div class="form-group col-md-4 mt-3">
                        <div class="mb-3">
                            <label for="title"><h4>Title</h4></label>
                            <input type="text" name="title" id="title" class="form-control" value="">
                        </div>
                        <div class="mb-5">
                            <label for="sub_title"><h4>Sub Title</h4></label>
                            <input type="text" name="sub_title" id="sub_title" class="form-control" value="">
                        </div>
                        <div class="form-group col-md-6 mt-3">
                            <h3>Description</h3>
                            <textarea name="description" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="client"><h4>Client</h4></label>
                            <input type="text" name="client" id="client" class="form-control" value="">
                        </div>
                        <div class="mb-5">
                            <label for="catagory"><h4>Catagory</h4></label>
                            <input type="text" name="catagory" id="catagory" class="form-control" value="">
                        </div>
                    
                    </div>
                </div>
                       <input type="submit" name="submit" class="btn btn-primary mt-5">
                    </div>
            </form>
</main>
@endsection
                
                