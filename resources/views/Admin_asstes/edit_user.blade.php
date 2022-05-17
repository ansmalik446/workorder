@extends('Admin_asstes.layouts.main')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">


@section('content')


        <div class="card mt-2">


            <div class="card-header">
                <h4>User</h4>
            </div>
            <div class="card-content p-3">
                <form action="{{url('admin/update_user')}}" method="POST">
                    @csrf
                    <div class="row p-3">
                        <div class="col-lg-12 col-12 mt-2">
                            <input type="hidden" name="id" value="{{$user->id}}">
                           <label><b>Name</b></label><br>
                            <input type="text" class="form-control mt-1" name="name" value="{{$user->name}}" placeholder="Name" required>
                        </div>
                        <div class="col-lg-12 col-12 mt-2">
                            <label><b>Email</b></label><br>
                            <input type="email" class="form-control mt-1" name="email" value="{{$user->email}}" placeholder="Email" required>

                         </div>

                         <div class="col-lg-12 col-12 mt-2">
                            <label><b>Password</b></label><br>
                             <input type="password" class="form-control mt-1" name="password" placeholder="Password">
                         </div>
                         <div class="col-lg-12 col-12 mt-2">
                            <label><b>Number</b></label><br>
                             <input type="text" class="form-control mt-1" name="number" value="{{$user->number}}" placeholder="Number" required>
                         </div>
                         <div class="col-lg-12 col-12 mt-2">
                            <label><b>Address</b></label><br>
                             <input type="text" class="form-control mt-1" name="address" value="{{$user->address}}" placeholder="Address" required>
                         </div>
                         <div class="col-lg-12 col-12 mt-2">
                            <label><b>Bio</b></label><br>
                           <textarea name="bio" id="" class="form-control"  rows="5">{{$user->Bio}}</textarea>
                         </div>

<div class="col-12 mt-3">
    <button class="btn btn-primary float-right" type="submit">Update</button>
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
                    <div class="col-lg-12 col-12 mt-2">
                       <label><b>Name</b></label><br>
                        <input type="text" class="form-control mt-1" name="name" placeholder="Name" required>
                    </div>
                    <div class="col-lg-12 col-12 mt-2">
                        <label><b>Email</b></label><br>
                        <input type="email" class="form-control mt-1" name="email" placeholder="Email" required>

                     </div>

                     <div class="col-lg-12 col-12 mt-2">
                        <label><b>Password</b></label><br>
                         <input type="password" class="form-control mt-1" name="password" placeholder="Password" required>
                     </div>
                     <div class="col-lg-12 col-12 mt-2">
                        <label><b>Number</b></label><br>
                         <input type="text" class="form-control mt-1" name="number" placeholder="Number" required>
                     </div>
                     <div class="col-lg-12 col-12 mt-2">
                        <label><b>Address</b></label><br>
                         <input type="text" class="form-control mt-1" name="address" placeholder="Address" required>
                     </div>
                     <div class="col-lg-12 col-12 mt-2">
                        <label><b>Bio</b></label><br>
                       <textarea name="bio" id="" class="form-control"  rows="5"></textarea>
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
