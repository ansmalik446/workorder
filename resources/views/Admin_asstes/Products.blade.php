@extends('Admin_asstes.layouts.main')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">


@section('content')

        <div class="row">
            <div class="col-lg-12">
                <button type="button" class="btn btn-primary" style="float: right;" data-toggle="modal" data-target="#exampleModal">
                    Add Product
                  </button>
            </div>
        </div>
        <div class="card mt-2">


            <div class="card-header">
                <h4>Product</h4>
            </div>
            <div class="card-content p-3">
                {{-- <form action="#">

                 <div class="row p-3">

                    <div class="col-lg-12 col-12 mt-2">
                        <input name="file1" type="file" class="dropify" data-height="100" />
                    </div>
                     <div class="col-lg-10 col-12 mt-2">
                        <label><b>Header Text:</b></label><br>
                         <input type="text" class="form-control mt-1" name="text" placeholder="Header Text">
                     </div>
                     <div class="col-lg-2 col-12 mt-2">
                         <label><b> Select Color : </b></label><br>
                        <input type="color" class="mt-1"  id="favcolor" name="color" value="#ff0000">
                    </div>

                 </div>
                </form> --}}

                <div class="table-responsive">
                    <table class="table zero-configuration">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Product Name</th>



                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $x=0;
                            @endphp
                            @foreach ($products as $header)
                            @php
                                $x++;
                            @endphp
                            <tr>
                                <td>{{$x}}</td>
                                <td>{{$header->name}}</td>

                                <td>


                                    <a href="{{url('superadmin/edit_product/'.$header->id)}}"  class="btn btn-primary ml-lg-1 ml-md-1 mt-1">Edit</a>

                                    <a href="{{url('superadmin/delete_product/'.$header->id)}}" class="btn btn-danger ml-lg-1 ml-md-1 mt-1" onclick="return confirm('Are you sure you want to delete this Product?');">Delete</a>


                                </td>
                            </tr>

                            @endforeach



















                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Product Name</th>




                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>


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
            <form action="{{url('superadmin/add_product')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row p-3">
                    <div class="col-12 mt-2">
                       <label><b>Product Image</b></label><br>

                        <input name="file" type="file"  class="dropify" data-height="100" />
                    </div>
                    <div class="col-lg-12 col-12 mt-2">
                       <label><b>Product Name</b></label><br>
                        <input type="text" class="form-control mt-1" name="name" placeholder="Product Name" required>
                    </div>
                    <div class="col-lg-12 col-12 mt-2">
                        <label><b>Sports Name</b></label><br>
                        <select name="sports_id" class="form-control">
                            @if (isset($sports))
                            @foreach ($sports as $sport)
                            <option value="{{$sport->id}}">{{$sport->name}}</option>
                            @endforeach

                            @endif
                        </select>
                     </div>
                    <div class="col-lg-12 col-12 mt-2">
                        <label><b>Product Description</b></label><br>
                        <textarea name="description" id="" class="form-control" rows="5" required></textarea>
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
@endsection
