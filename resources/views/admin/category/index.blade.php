@extends('layouts.admin.app')
   
@section('content')
<div class="container-fluid px-4">                      
                        <div class="card-header"><i class="fa fa-align-justify"></i>&nbsp;List Category
                        <a href="{{ url('admin') }}/category/create" role="button" class="btn btn-primary btn-spinner btn-sm pull-right m-b-0">
                        <i class="fa fa-plus"></i>&nbsp; New category</a></div>
                             <div class="card-body bg">
        
 @if(Session::has('message'))


<div class="alert alert-success alert-dismissible fade show" role="alert">
{{ Session::get('message') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

@if(Session::has('error'))

<div class="alert alert-danger alert-dismissible fade show" role="alert">
{{ Session::get('error') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

@endif


                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Title</th>
                                            <th>Slug</th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                           
                                        </tr>
                                    </thead>
                            
                                    <tbody>
                                        <?php $i = 1 ?>
                                        @foreach($categorys as $category)
                                        <tr>
                                            <td>{{$i++}}</td>                                            
                                            <td>{{$category->category_name}}</td>
                                            <td>{{$category->category_slug}}</td>
                                            @if($category->category_image)
                                            <td style="text-align: center;"><img src="{{URL::to('/')}}/upload/{{$category->category_image}}" style="width:100px;height:100px"></td>
                                           @else
                                           <td style="text-align: center;">No Image</td>
                                           @endif
                                            <td>Edinburgh</td>
                                            <td><button type="button" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></button>
                                            <button type="button" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></button>
                                            <button type="button" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
                                        </td>                                       
                                        </tr> 
                                        @endforeach                                
                                    </tbody>
                                </table>
                            </div>
                    </div>
@endsection