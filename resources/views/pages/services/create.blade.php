@extends('layouts.admin_layout')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Create</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
        
        <form action="{{route('admin.services.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        
            <div class="row">
                <div class="form-group col-md-4 mt-3">
                    <div class="mb-3">
                        <label for="icon"><h4>Font Awsome Icon</h4></label>
                        <input type="text" name="icon" id="icon" class="form-control">
                    </div>
                    <div class="mb-5">
                        <label for="title"><h4>Title</h4></label>
                        <input type="text" name="title" id="title" class="form-control" >
                    </div>

                    <div class="mb-5">
                        <label for="description"><h4>Description</h4></label>
                        
                        <textarea name="description" id="description" class="form-control"></textarea>
                    </div>
                    
                </div>
            </div>
                   <input type="submit" name="submit" class="btn btn-primary mt-5">
                </div>
        </form>
</main>
@endsection
                
                