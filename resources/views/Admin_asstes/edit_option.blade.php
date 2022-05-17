@extends('Admin_asstes.layouts.main')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">


@section('content')


        <div class="card mt-2">

            @if ($errors->has('product_id'))
            <div class="alert alert-danger">
            <span class="text-danger">Product Not Found</span>
            </div>
            @endif

            <div class="card-header">
                <h4>Options</h4>
            </div>
            <div class="card-content p-3">
                <form action="{{url('admin/update_option')}}" method="POST">
                    <input type="hidden" name="id" value="{{$option->id}}">
                    @csrf
                    <div class="row p-3">
                        {{-- <div class="col-12 mt-2">
                           <label><b>Image</b></label><br>

                            <input name="file" type="file"  class="dropify" data-height="100" />
                        </div> --}}
                        <div class="col-lg-12 col-12 mt-2">
                            <label><b>Sports Name</b></label><br>
                           <select name="sports" class="form-control" id="sports">
                               @if (isset($sports))


                            @foreach ($sports as $sport)
                            <option value="{{$sport->id}}" @if ($option->products->sports_id==$sport->id)
                                selected
                            @endif>{{$sport->name}}</option>
                            @endforeach
                               @endif



                           </select>
                         </div>
                         <div class="col-lg-12 col-12 mt-2">
                            <label><b>Product Name</b></label><br>
                           <select name="product_id" class="form-control" id="products">
                            @if (isset($products))


                            @foreach ($products as $product)
                            <option value="{{$product->id}}" @if ($option->product_id==$product->id)
                                selected
                            @endif>{{$product->name}}</option>
                            @endforeach
@endif
                           </select>
                         </div>
                        <div class="col-12 mt-2">
                            <label><b>Option</b></label><br>

                             <input type="text" name="option" value="{{$option->option}}" class="form-control" required>
                         </div>


                         <div class="col-12 mt-2">
                          <button class="btn btn-primary float-right">Update</button>
                         </div>




                    </div>
                </form>




            </div>
        </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">

      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{url('#')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row p-3">
                    {{-- <div class="col-12 mt-2">
                       <label><b>Image</b></label><br>

                        <input name="file" type="file"  class="dropify" data-height="100" />
                    </div> --}}
                    <div class="col-lg-12 col-12 mt-2">
                       <label><b>Product Name</b></label><br>
                        <input type="text" class="form-control mt-1" name="name" placeholder="Product Name" required>
                    </div>




                </div>


        </div>
        <div class="modal-footer">
          {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
          <button type="submit" class="btn btn-primary">Add</button>

        </div>
    </form>
      </div>

    </div>
  </div>




<script>
    $('.dropify').dropify();
</script>
<script>
    $(document).ready(function() {
        $('#sports').on('change',function(){
            // var value=$(this).val();
            var id=$(this).val();
            $.ajax({

    type:'get',
    url:'{{URL::to('admin/get_product')}}',
    data:{'id':id},

    success:function(data){

        $('#products').empty().append(data);

    },


        });
        });



    });
    </script>
@endsection
