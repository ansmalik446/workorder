@extends('Admin_asstes.layouts.main')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">


@section('content')


<div class="card mt-2">


    <div class="card-header">
        <h4>Footer</h4>
    </div>
    <div class="card-content p-3">
        <form action="{{url('superadmin/update_footer')}}" method="POST" enctype="multipart/form-data">
            @csrf

         <div class="row p-3">

            <div class="col-lg-12 col-12 mt-2">
                <input type="hidden" name="id" value="{{$header->id}}">
                <label for=""><b>Logo</b></label><br>
                <input name="file" type="file" data-default-file="{{asset('upload/footer/'.$header->logo)}}" class="dropify" data-height="100" />
            </div>
             <div class="col-lg-6 col-12 mt-2">
                <label><b>Logo Heading:</b></label><br>
                 <input type="text" class="form-control mt-1" value="{{$header->logo_heading}}" name="logo_heading">
             </div>
             <div class="col-lg-6 col-12 mt-2">
                <label><b>City1:</b></label><br>
                 <input type="text" class="form-control mt-1" value="{{$header->city1}}" name="city1">
             </div>
             <div class="col-lg-6 col-12 mt-2">
                <label><b>City2:</b></label><br>
                 <input type="text" class="form-control mt-1" value="{{$header->city2}}" name="city2">
             </div>
             <div class="col-lg-6 col-12 mt-2">
                <label><b>City3:</b></label><br>
                 <input type="text" class="form-control mt-1" value="{{$header->city3}}" name="city3">
             </div>
             <div class="col-lg-6 col-12 mt-2">
                <label><b>City4:</b></label><br>
                 <input type="text" class="form-control mt-1" value="{{$header->city4}}" name="city4">
             </div>
             <div class="col-lg-6 col-12 mt-2">
                <label><b>Twitter Link:</b></label><br>
                 <input type="text" class="form-control mt-1" value="{{$header->link1}}" name="link1">
             </div>
             <div class="col-lg-6 col-12 mt-2">
                <label><b>Instagram Link:</b></label><br>
                 <input type="text" class="form-control mt-1" value="{{$header->link2}}" name="link2">
             </div>
             <div class="col-lg-6 col-12 mt-2">
                <label><b>LinkedIn Link:</b></label><br>
                 <input type="text" class="form-control mt-1" value="{{$header->link3}}" name="link3">
             </div>
             <div class="col-lg-6 col-12 mt-2">
                <label><b>Contact heading:</b></label><br>
                 <input type="text" class="form-control mt-1" value="{{$header->contact_heading}}" name="contact_heading">
             </div>
             <div class="col-lg-6 col-12 mt-2">
                <label><b>Location Part1:</b></label><br>
                 <input type="text" class="form-control mt-1" value="{{$header->loc_p1}}" name="loc_p1">
             </div>
             <div class="col-lg-6 col-12 mt-2">
                <label><b>Location Part2:</b></label><br>
                 <input type="text" class="form-control mt-1" value="{{$header->loc_p2}}" name="loc_p2">
             </div>
             <div class="col-lg-6 col-12 mt-2">
                <label><b>Location Part3:</b></label><br>
                 <input type="text" class="form-control mt-1" value="{{$header->loc_p3}}" name="loc_p3">
             </div>
             <div class="col-lg-6 col-12 mt-2">
                <label><b>Number:</b></label><br>
                 <input type="text" class="form-control mt-1" value="{{$header->number}}" name="number">
             </div>

            <div class="col-lg-12 col-12 mt-2">
               <button class="btn btn-primary" style="float: right"  type="submit">Update</button>
           </div>

         </div>
        </form>




    </div>
</div>




<script>
    $('.dropify').dropify();
</script>
@endsection
