@extends('user.layout.header')
<link rel="stylesheet" href="{{asset('css/home.css')}}">

<link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">
<style>
    section.roster-bg {
    background-color: #e5e5e5ba;
    min-height: 100vh;
}
</style>

@section('content')
    <section class="roster-bg">
        <form action="{{url('admins/add/roaster')}}" method="POST"  enctype="multipart/form-data" id="add_roast_form">
            @csrf
            <input type="hidden" name="or_id" value="{{$id}}">
            <input name="file_id" type="hidden"  class="csv_id">
        <div class="container-fluid">
            <div class="row">
                <div class="col-3">
                <div class="d-flex justify-content-start pt-4"> <a href="{{url('admins/pre_option/' .$id)}}"> <input type="button" value="Go Back" class="btn btn-success mr-2"></a></div>
                </div>
                <div class="col-9">
                <div class="d-flex justify-content-end align-items-center pl-4 pt-4">
                    <a href="{{ url('admins/')}}"><button class="btn btn-primary print_btn2 mr-2 d-none" ></button></a>
             <input type="submit" value="Print And Save" name="btn_val" class="btn btn-primary print_btn1 mr-2 d-none " formtarget="_blank">

             <input type="button" value="Print And Save" name="btn_val" class="btn btn-primary print_btn mr-2">
           <input type="submit" value="Save" name="btn_val" class="btn btn-success mr-2">

        </div>
                </div>
            </div>
        </div>
       
        <div class="container-fluid">
            <div class="row">

                @php $r=0;
                     $p=0;

                 @endphp
                @foreach($prev_ros as $row_rost)
                @php $p++; @endphp
                @if($r==0)
                <div class="col-lg-3 col-xl-3 col-md-3 col-12">
                    <div class="py-5 text-center pt-5">
                        @php
                            $ros=count($prev_ros);
                            if($ros==0)
                            {
                                $add_ros=0;

                            }
                            else
                            {
                                --$ros;
                                $add_ros=$ros;
                            }

                        @endphp
                       <button class="btn btn-primary" id="btn_addsection" type="button" add_new="{{count($prev_ros)}}" add_roast="{{$add_ros}}"><i class="fas fa-plus"></i>&nbsp; Add New Roster</button>
                    </div>
                </div>
                @else
                <div class="col-lg-3 col-xl-3 col-md-3 col-12">
                    
                </div>
                @endif
                <div class="col-lg-9 col-xl-9 col-md-9 col-12" id="sectionadd">
                    @if (\Session::has('error'))
    <div class="alert alert-danger">
        <ul>
            <li>{!! \Session::get('error') !!}</li>
        </ul>
    </div>
@endif
                   
                     <div class="row mx-3 my-3 bg-white roster-border" id="roster-border{{$r}}">
                        <div class="col-12">
                            <h3 class="pt-4 pl-4">ROSTER</h3>
                        </div>


                        <div class="col-12 pt-4 d-flex justify-content-between">

                            <div>
                                <div class="uploadLogo mt-2 p-2">
                                    {{-- <input name="order_id" type="hidden"  value="{{$id}}" /> --}}
                                    <input name="file{{$r}}" type="file"  class="csv_data{{$r}}" accept=".csv">
                                    <button class="btn btn-primary add_roaster_csv" val="{{$r}}" type="button">Add</button><a href="{{asset('sample.csv')}}" download="" data-toggle="tooltip" title="Sample File"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
  <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
</svg></i>
</a>

                                  {{-- <img src="./img/uploadicon.png" class="img-fluid"> --}}
                                </div>
                            </div>
                            <div class="d-flex justify-content-end align-items-center pl-4">
                                <button class="btn btn-primary btn_addRow" id="" val2="{{$p}}" val3="{{$r}}" type="button"><i class="fas fa-plus"></i>&nbsp; Add Row</button>

                            </div>
                        </div>
                         <div class="col-12">
                       <div class="float-right">
                            <i class="fa fa-trash text-danger "id="deletebn" val4="{{$r}}"></i>
                            </div>
                        </div>
                       

                        <div class="col-12 pt-5 text-center">
                            <textarea style="
                                color: #FFF;
                                background: transparent;
                                color: black;
                               border: none;
                                outline: none;color: black" name="name[{{$r}}][]" id="" cols="20" rows="1">{{$row_rost->name}}</textarea>
                        </div>
                        <div class="col-12 pt-4">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Number</th>
                                        <th scope="col">Name(if Applicable)</th>
                                        <th scope="col">Top Size</th>
                                        <th scope="col">Bottom Size</th>
                                        <th scope="col">Notes</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="add_row{{$p}}">
                                    @foreach($row_rost->detail as $row_detail)    

                                    <tr class="rowadd" id="removeTr">
                                        <th scope="row"><input type="number" size="2"  class="form-control" name="number[{{$r}}][]" value="{{$row_detail->number}}" required></th>
                                        <td><input type="text" class="form-control" name="sname[{{$r}}][]"  value="{{$row_detail->name}}"></td>
                                        <td><input type="text" class="form-control" name="top_size[{{$r}}][]"  value="{{$row_detail->top_size}}" required></td>
                                        <td><input type="text" class="form-control" name="bottom_size[{{$r}}][]"  value="{{$row_detail->bottom_size}}" required></td>
                                        <td><input type="text" class="form-control" name="notes[{{$r}}][]"  value="{{$row_detail->notes}}" required></td>
                                        <td><i class="fa fa-trash text-danger "id="deletebtn" ></i></td>
                                    </tr>
                                    @endforeach
                                    @php $r++; @endphp

                                    </tbody>
                                </table>
                            </div>
                        </div>
                       
                    </div>
                  
                </div>
                @endforeach


            </div>
        </div>
    </form>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
    <script>
        $( document ).ready(function() {
            var r=1;
            var rw=0;
            $('#btn_addsection').click(function () {
              
                
                    var val = $(".roster-border").attr('val');
                    var val2 = $(this).attr('add_new');
                    var val3 = $(this).attr('add_roast');
                    


val++;
val2++;
val3++;

$("#btn_addsection").attr('add_new',val2);
$("#btn_addsection").attr('add_roast',val3);
$(".roster-border").attr('val', val);
var html=`  <div class="row mx-3 my-3 bg-white roster-border" id="roster-border${r}">
                        <div class="col-12">
                            <h3 class="pt-4 pl-4">ROSTER</h3>
                        </div>
                       <div class="col-12">
                       <div class="float-right">
                            <i class="fa fa-trash text-danger "id="deletebn" val4="${r}"></i>
                            </div>
                        </div>
                        <div class="col-12 pt-4 d-flex justify-content-between">
                            <div>
                                <div class="uploadLogo mt-2 p-2">
                                    

                                    <input name="file${val3}" type="file"  class="csv_data${val3}" accept=".csv">
                                    <button class="btn btn-primary add_roaster_csv" val="${val3}" type="button">Add</button>
                                    <a href="{{asset('sample.csv')}}" download="" data-toggle="tooltip" title="Sample File"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"  fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
  <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
</svg></i>
</a>



                                </div>
                            </div>
                            <div class="d-flex justify-content-end align-items-center pl-4">
                                <button class="btn btn-primary btn_addRow btn_addRowone" id="${r}" val2="${val2}" val3="${val3}" type="button"><i class="fas fa-plus"></i>&nbsp; Add Row</button>

                            </div>
                        </div>
                        <div class="col-12 pt-5 text-center">
                            <textarea style="
    color: #FFF;
    background: transparent;
    color: black;
   border: none;
    outline: none;color: black" name="name[${val3}][]" id="" cols="20" rows="1">Roster name</textarea>
                        </div>
                        <div class="col-12 pt-4">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Number</th>
                                        <th scope="col">Name(if Applicable)</th>
                                        <th scope="col">Top Size</th>
                                        <th scope="col">Bottom Size</th>
                                        <th scope="col">Notes</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="add_row${val2}">
                                    <tr class="rowadd" id="removeTr">
                                        <th scope="row"><input type="number" class="form-control"name="number[${val3}][]"required></th>
                                        <td><input type="text" class="form-control"name="sname[${val3}][]"></td>
                                        <td><input type="text" class="form-control"name="top_size[${val3}][]"required></td>
                                        <td><input type="text" class="form-control"name="bottom_size[${val3}][]"required></td>
                                        <td><input type="text" class="form-control"name="notes[${val3}][]"required></td>
                                        <td><i class="fa fa-trash text-danger "id="deletebtn" ></i></td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>`;



var tableBody = $("#sectionadd").append(html);
$('.dropify').dropify();
});
r++;
  $(document).on('click', '#deletebn', function() {
          var button_id = $(this).attr("val4");

                $('#roster-border' + button_id + '').remove();


    });

                $('.btn_addRow').click(function () {
                  
                    var val = $(".rowadd").attr('val');
                    var val2 = $(this).attr('val2');
                    var val3 = $(this).attr('val3');

val++;
$(".rowadd").attr('val', val);
var html=`<tr class="rowadd" id="removeTr">
                         <th scope="row"><input type="number" class="form-control" name="number[${val3}][]" required></th>
                         <td><input type="text" class="form-control"name="sname[${val3}][]"></td>
                                        <td><input type="text" class="form-control"name="top_size[${val3}][]"required></td>
                                        <td><input type="text" class="form-control"name="bottom_size[${val3}][]"required></td>
                                        <td><input type="text" class="form-control"name="notes[${val3}][]"required></td>
                            <td><i class="fa fa-trash text-danger "id="deletebtn" ></i></td>
                                    </tr>`;



var tableBody = $("#add_row"+val2).append(html);

});

    $(document).on('click', '#deletebtn', function() {

        $(this).closest('#removeTr').remove();
    });





$(document).on('click', '.btn_addRowone', function () {

var button_id = $(this).attr("id");
var button_id2 = $(this).attr("val2");
var val3 = $(this).attr("val3");

var html=`<tr class="rowadd" id="removeTr">
                         <th scope="row"><input type="number" class="form-control" name="number[${val3}][]"required></th>
                         <td><input type="text" class="form-control"name="sname[${val3}][]"></td>
                                        <td><input type="text" class="form-control"name="top_size[${val3}][]"required></td>
                                        <td><input type="text" class="form-control"name="bottom_size[${val3}][]"required></td>
                                        <td><input type="text" class="form-control"name="notes[${val3}][]"required></td>
                            <td><i class="fa fa-trash text-danger "id="deletebtn"></i></td>
                                    </tr>`;
var tableBody = $('#add_row' + button_id2 + '').append(html);

 $(document).on('click', '#deletebtn', function() {

        $(this).closest('#removeTr').remove();
    });


        });
     });

        </script>



        <script type="text/javascript">
        $(document).ready(function (e) {
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });




            $(document).on('click', '.add_roaster_csv', function () {

                var id=$(this).attr('val');
                $(".csv_id").val(id);
                var file =new FormData($('#add_roast_form')[0]);
                var op;
                $(this).html(`<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>Loading...`);


                console.log(file);
                $.ajax({
                    processData: false,
                    contentType: false,
                    cache: false,
   
                    enctype: 'multipart/form-data',
                    type:'POST',
                    url: "{{ url('add_csv')}}",
                    data:file, 

                    success: (data) => {
                        if(data['success']==true)
                        {
                         for (var i = 0; i < data['file'].length; i++) {
                            op +=`<tr class="rowadd" id="removeTr">
                             <th scope="row"><input type="number" class="form-control" name="number[${id}][]"required value="${data['file'][i].Number}"></th>
                             <td><input type="text" class="form-control"name="sname[${id}][]" value="${data['file'][i].Name}"></td>
                                            <td><input type="text" class="form-control"name="top_size[${id}][]"required value="${data['file'][i].Top_Size}"></td>
                                            <td><input type="text" class="form-control"name="bottom_size[${id}][]"required value="${data['file'][i].Bottom_Size}"></td>
                                            <td><input type="text" class="form-control"name="notes[${id}][]" value="${data['file'][i].Notes}" required></td>
                                <td><i class="fa fa-trash text-danger "id="deletebtn"></i></td>
                                        </tr>`

                            }
                            id++;
                            var tableBody = $('#add_row'+id).append(op);
                        }
                        $(this).html(`Add`);
                        if(data['success']==false)
                        {
                            Swal.fire({
                              icon: 'error',
                              title: 'Oops...',
                              text: data['msg'],
                            })

                        }
                        
                   
                    console.log(data);
                    },
                    error: function(data){
                    console.log(data);
                    }
                });
            });
            $(document).on('click', '.print_btn', function () {
                $('.print_btn1').click();
                $('.print_btn2').click();

            });
        });
         
        
       
    
</script>
      
@endsection

