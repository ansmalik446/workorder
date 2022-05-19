@extends('Admin_asstes.layouts.main')



@section('content')

<div class="row">
    <div class="col-lg-12">
        <button type="button" class="btn btn-primary" style="float: right;" data-toggle="modal" data-target="#exampleModal">
            Change Password
          </button>
    </div>
</div>
        <div class="card mt-2">


            <div class="card-header">
                <h4>Update profile</h4>
            </div>
            <div class="card-content p-3">
                <form action="{{url('superadmin/update/profile')}}" method="POST" enctype="multipart/form-data">
@csrf
                 <div class="row p-3">

                    <div class="col-lg-12">
                        <lable>Name</lable>
                        <input type="hidden" name="id" 
                        value="{{auth()->user()->id}}" class="form-control">
                        <input type="text" name="name" required placeholder="Name"
                               value="{{$user->name}}" class="form-control">
                    </div>
                    <div class="col-lg-12">
                        <lable>Email</lable>
                        <input type="email" name="email" required placeholder="Email"
                               value="{{$user->email}}" class="form-control">
                    </div>
                    
                    {{-- <div class="col-lg-12 col-12 mt-2">
                        <label><b>Password</b></label><br>
                         <input type="password" class="form-control mt-1" name="password" placeholder="Password">
                     </div> --}}
                   

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
          <h5 class="modal-title" id="exampleModalLabel">Update Password</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{url('superadmin/update/password')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" 
                value="{{auth()->user()->id}}" class="form-control">
                <div class="row p-3">
                    <div class="col-lg-12 col-12 mt-2">
                       <label><b>Old Password</b></label><br>
                       <input type="password" name="old_pass" class="form-control">
                    </div>
                    <div class="col-lg-12 col-12 mt-2">
                        <label><b>New Password</b></label><br>
                        <input type="password" name="password" class="form-control">
                                            @if($errors->has('password'))

                                                <span style="color: red" >
                                        <strong>{{$errors->first('password')}}</strong>
                                    </span>
                                            @endif

                     </div>

                     <div class="col-lg-12 col-12 mt-2">
                        <label><b>Confirm Password</b></label><br>
                        <input type="password" name="password_confirmation" class="form-control">
                     </div>
                     




               


        </div>
        <div class="modal-footer">
          {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
          <button type="submit" class="btn btn-primary">Update Password</button>

        </div>
    </form>
      </div>

    </div>
  </div>

  {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  --}}

  @endsection
  @section('js')
<script>
  @if($errors->has('password'))
     $("#exampleModal").modal('show');
  @endif
    $('.dropify').dropify();
</script>
<script>
  
var currentDate="{{\Carbon\Carbon::now()->timezone('Asia/Karachi')->format('Y-m-d H:i:s')}}";
// alert(currentDate);
  </script>
@endsection
