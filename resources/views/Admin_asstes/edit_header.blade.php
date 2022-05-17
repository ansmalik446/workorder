@extends('Admin_asstes.layouts.main')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">


@section('content')


<div class="card mt-2">


    <div class="card-header">
        <h4>Header</h4>
    </div>
    <div class="card-content p-3">
        <form action="{{url('admin/update_header')}}" method="POST" enctype="multipart/form-data">
            @csrf

         <div class="row p-3">

            <div class="col-lg-12 col-12 mt-2">
                <input type="hidden" name="id" value="{{$header->id}}">
                <input name="file" type="file" data-default-file="{{asset('upload/header/'.$header->image)}}" class="dropify" data-height="100" />
            </div>
             <div class="col-lg-12 col-12 mt-2">
                <label><b>Header Text:</b></label><br>
                 <input type="text" class="form-control mt-1" value="{{$header->text}}" name="text" placeholder="Header Text">
             </div>
             <div class="col-lg-6 col-12 mt-2">
                 <label><b> Select Color : </b></label><br>
                <input type="color" class="mt-1"  id="favcolor" name="color" value="{{$header->color}}">
            </div>
            <div class="col-lg-6 col-12 mt-2">
                <label><b> Select SecondaryColor : </b></label><br>
               <input type="color" class="mt-1"  id="favcolor" name="secondarycolor" value="{{$header->secondarycolor}}">
           </div>
            <div class="col-lg-12 col-12 mt-2">
               <button class="btn btn-primary" type="submit">Update</button>
           </div>

         </div>
        </form>




    </div>
</div>




<script>
    $('.dropify').dropify();
</script>
@endsection
