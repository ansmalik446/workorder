@extends('Admin_asstes.layouts.main')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">


@section('content')


        <div class="card mt-2">


            <div class="card-header">
                <h4>Sports</h4>
            </div>
            <div class="card-content p-3">
                <form action="{{url('superadmin/update_sports')}}" method="POST" enctype="multipart/form-data">
@csrf
                 <div class="row p-3">
                    <div class="col-12 mt-2">
                        <input type="hidden" name="id" value="{{$sport->id}}">
                        <label><b>Image</b></label><br>

                         <input name="file" type="file" data-default-file="{{asset('upload/sports/'.$sport->image)}}"  class="dropify" data-height="100" />
                     </div>

                     <div class="col-12 mt-2">
                        <label><b>Sport Name:</b></label><br>
                         <input type="text" class="form-control mt-1" name="name" placeholder="Product Name" value="{{$sport->name}}">
                     </div>

                     <div class="col-12 mt-3">
                         <button type="submit" class="btn btn-primary float-right">Update</button>
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
          <h5 class="modal-title" id="exampleModalLabel">Edit Sports</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{url('#')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row p-3">
                    <div class="col-12 mt-2">
                       <label><b>Image</b></label><br>

                        <input name="file" type="file"  class="dropify" data-height="100" />
                    </div>
                    <div class="col-lg-12 col-12 mt-2">
                       <label><b>Product Name</b></label><br>
                        <input type="text" class="form-control mt-1" name="name" placeholder="Product Name" required>
                    </div>




                </div>


        </div>
        <div class="modal-footer">
          {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
          <button type="submit" class="btn btn-primary">Update</button>

        </div>
    </form>
      </div>

    </div>
  </div>




<script>
    $('.dropify').dropify();
</script>
@endsection
