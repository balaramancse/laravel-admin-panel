@extends('layouts.admin.app')
@section('content')
<div class="container-fluid px-4">
   <div class="card-header"><i class="fa fa-align-justify"></i>&nbsp;Create Category
      <a href="{{url('admin')}}/category" role="button" class="btn btn-primary btn-spinner btn-sm pull-right m-b-0">
      &nbsp; ❮ &nbsp;Back</a>
   </div>
   <div class="card-body bg">
   @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

   <form id="category_form" action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
   {{ csrf_field() }}
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="slug-source" name="category_name"  placeholder="Title">
                </div>
            </div>

            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Slug</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="slug-target" readonly name="category_slug"  placeholder="Slug">
                </div>
            </div>

            
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Image</label>
                <div class="col-sm-9">
                    <input type="file" class="form-control" name="image"  placeholder="Slug">
                </div>
            </div>

            <!-- <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-9">
                <input type="text" id="summernote" class="form-control"  placeholder="Title">
                    
                </div>
            </div> -->
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-9">
                <button type="submit" class="btn btn-info">Save</button>
                </div>
            </div>
        
            
      </form>
   </div>
</div>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script> 

<script src="https://www.jqueryscript.net/demo/Converting-A-Title-To-A-URL-Slug-Using-jQuery-Slugify-Plugin/dist/slugify.js"></script>

<script>
jQuery(function($) {
  $('#slug-target,#slug-target-span').slugify('#slug-source'); // Type as you slug

});
</script>
@endsection