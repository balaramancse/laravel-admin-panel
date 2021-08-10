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
<div class="alert alert-danger" id="success-alert" style="display:none"> Success Message</div>

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
                                            <td style="text-align: center;">{{$i++}}</td>                                            
                                            <td>{{$category->category_name}}</td>
                                            <td>{{$category->category_slug}}</td>
                                            @if($category->category_image)
                                            <td style="text-align: center;"><img src="{{URL::to('/')}}/upload/{{$category->category_image}}" style="width:100px;height:100px"></td>
                                           @else
                                           <td style="text-align: center;">No Image</td>
                                           @endif
                                            <td style="text-align: center;"> <input data-id="{{$category->id}}"  type=checkbox class='ckb' data-off="InActive" {{ $category->status ? 'checked' : '' }}>  </td>
                                            <td>
                                              <form action="{{ route('category.destroy',$category->id) }}" method="POST">
                                                <a href="{{ route('category.show',$category->id) }}"><button type="button" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></button></a>
                                                <a href="{{ route('category.edit',$category->id) }}"><button type="button" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></button></a>
                                                @csrf
                                                @method('DELETE')        
                                                <button type="submit" data-id="{{$category->id}}"  class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
                                              </form>
                                          </td>                                       
                                        </tr> 
                                        @endforeach                                
                                    </tbody>
                                </table>
                            </div>
                    </div>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
 <script>$(document).ready(function() {
 $(".ckb").change(function(){
  var status = $(this).prop('checked') == true ? 1 : 0; 
  var cat_id = $(this).data('id'); 
  $.ajax({
    headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
            type: 'post',
            dataType: "json",           
            url:'{!!URL::to('admin/changeStatus')!!}',
            data: {'status': status, 'cat_id': cat_id},
            success: function(data){      
              $('#success-alert').html(data).fadeIn('slow');
     $('#success-alert').html("Status update successfully").fadeIn('slow') //also show a success message 
     $('#success-alert').delay(1500).fadeOut('slow');
            }
        });
});
});
</script>




@endsection