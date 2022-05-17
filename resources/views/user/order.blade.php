@extends(Auth::user()->role=="admins" ? 'user.dash_layouts.main' : ((Auth::user()->role == "superadmin") ? '../Admin_asstes.layouts.main' : '../Admin_asstes.layouts.main'))


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">


@section('content')

        {{-- <div class="row">
            <div class="col-lg-12">
               <a href="{{url('superadmin/order_detail')}}"> <button type="button" class="btn btn-primary" style="float: right;" data-toggle="modal" data-target="#exampleModal">
                    Order Detail
                  </button></a>
            </div>
        </div> --}}
        <div class="card mt-2">


            <div class="card-header">
                <h4>Orders</h4>
                <a href="{{url('admins/')}}"><button class="btn btn-success">New Work Order</button></a>
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
                               
                                <th>Phone</th>
                                <th>Team</th>
                                <th>Order Number</th>
                                <th>Date Created</th>
                                <th>Order detail</th>
                              

                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $x=0;
                            @endphp
                           
                            @php
                                $x++;
                            @endphp
                            @foreach($orderdetail as $order)
                            <tr>
                                <td>{{$x++}}</td>
                                <td>{{$order->user->number}}</td>
                                <td>{{$order->team_name}}</td>
                                <td>{{$order->order_id}}</td>
                                <td>{{$order->created_at->format('d/m/Y')}}</td>
                                
                                <td ><a href="{{url('admins/edit_option/'.$order->id)}}"> <button type="button" class="btn btn-primary ml-lg-1 ml-md-1 mt-1"  data-toggle="modal" data-target="#exampleModal">
                                    Edit
                                  </button></a><a href="{{url('admins/order_detail/'.$order->id)}}"> <button type="button" class="btn btn-info ml-lg-1 ml-md-1 mt-1"  data-toggle="modal" data-target="#exampleModal">
                                    View
                                  </button></a><a href="{{url('delete_option/'.$order->id)}}" > <button type="button" class="btn btn-danger ml-lg-1 ml-md-1 mt-1" onclick="return confirm('Are You Sure?')">
                                    Delete
                                  </button></a></td>
                 
                            </tr>
                        @endforeach

                          



















                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>User Email</th>
                                <th>Name</th>
                                <th>Number</th>


                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>


            </div>
        </div>

<!-- Modal -->
{{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">

      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Users</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{url('superadmin/adduser')}}" method="POST" enctype="multipart/form-data">
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
                       <textarea name="bio" id="" class="form-control"  rows="5" required></textarea>
                     </div>




                </div>


        </div>
        <div class="modal-footer">
          {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
          {{-- <button type="submit" class="btn btn-primary">Add User</button> --}}

        </div>
    </form>
      </div>

    </div>
  </div> --}}




<script>
    $('.dropify').dropify();
</script>
@endsection
