<meta name="csrf-token" content="{{ csrf_token() }}" />
<style type="text/css">
    .select2-selection{
        width: 400px!important;
    }
</style>
<div class="col-12 mt-2">
    <div class="row">
        <div class="col-6">
            <div id="accordion">
                <div class="card">
                    <div class="card-header" id="headingOne" style="background-color: #c3d2e1;">
                        <h5 class="">
                            <button aria-controls="collapseOne" aria-expanded="true" class="btn btn-link tabclick text-dark" data-target="#collapseOne" data-toggle="collapse" type="button">
                                Product Option
                            </button>
                            
                        </h5>
                        <div class="float-right">
                            <i class="fas fa-plus mr-1 pluscolor prod_op" val="Product Option">
                                </i>
                        </div>
                    </div>
                    
                    <div aria-labelledby="headingOne" class="collapse " data-parent="#accordion" id="collapseOne">

                    @forelse($prod_options as $list)
                        <div class="col-lg-12 my-2">
                            {{$list->child}}
                            <div class="float-right">
                                <i class="fas fa-plus mr-1 pluscolor pro_op" val="{{$list->parent}}" val2="{{$list->child}}">
                                </i>
                                <i class="fas fa-edit editcolor pro_edit" val="{{$list->parent}}" val2="{{$list->child}}" val3="{{$id}}">
                                </i>
                            </div>
                        </div>
                        @empty
                        <div class="col-lg-12 my-2">
                            no product option available</div>
                    @endforelse

                        
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div id="accordion2">
                <div class="card">
                    <div class="card-header" id="headingOne" style="background-color: #c3d2e1;">
                        <h5 class="mb-0">
                            <button aria-controls="collapseTwo" aria-expanded="true" class="btn btn-link tabclick text-dark" data-target="#collapseTwo" data-toggle="collapse" type="button">
                                Color Version
                            </button>
                        </h5>
                        <div class="float-right">
                            <i class="fas fa-plus mr-1 pluscolor color_ver" val="Color Version">
                                </i>
                        </div>
                    </div>
                    <div aria-labelledby="headingTwo" class="collapse " data-parent="#accordion2" id="collapseTwo">

                        @forelse($col_vers as $list2)
                            <div class="col-lg-12 my-2">
                                {{$list2->child}}
                                <div class="float-right">
                                    <i class="fas fa-plus mr-1 pluscolor pro_op" val="{{$list2->parent}}" val2="{{$list2->child}}">
                                    </i>
                                    <i class="fas fa-edit editcolor pro_edit2" val="{{$list2->parent}}" val2="{{$list2->child}}" val3="{{$id}}">
                                    </i>
                                </div>
                            </div>
                            @empty
                            <div class="col-lg-12 my-2">
                                no Color Version available</div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-12 mt-2">
<div class="row">
    <div class="col-6">
        <div id="accordion3">
            <div class="card">
                <div class="card-header" id="headingOne" style="background-color: #c3d2e1;">
                    <h5 class="mb-0">
                        <button aria-controls="collapseThree" aria-expanded="true" class="btn btn-link tabclick text-dark" data-target="#collapseThree" data-toggle="collapse" type="button">
                            Color
                        </button>
                    </h5>
                </div>
                <div aria-labelledby="headingThree" class="collapse " data-parent="#accordion3" id="collapseThree">
                    <div class="">
                        <div class="col-lg-12 my-2">
                            Color 
                            <div class="float-right">
                                <i class="fas fa-plus mr-1 pluscolor pro_op" val="Color" val2="Color">
                                    </i>
                                    <i class="fas fa-edit editcolor pro_edit" val="Color" val2="Color" val3="{{$id}}">
                                    </i>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-6"> 
        <div id="accordion4">
            <div class="card">
                <div class="card-header" id="headingOne"style="background-color: #c3d2e1;">
                    <h5 class="mb-0">
                        <button type="button" class="btn btn-link tabclick text-dark" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                         Logo Text And Size
                        </button>
                    </h5>
                </div>
    
                <div id="collapseFour" class="collapse " aria-labelledby="headingFour" data-parent="#accordion4">
                    <div class="">
    
                        <div class="col-lg-12   my-2">
                        Logo Text And Size
                            <div class="float-right">
                                <i class="fas fa-plus mr-1 pluscolor pro_op" val="Logo Text And Size" val2="Logo Text And Size">
                                    </i>
                                    <i class="fas fa-edit editcolor pro_edit" val="Logo Text And Size" val2="Logo Text And Size" val3="{{$id}}">
                                    </i>
                            </div>
                        </div>
                        
               
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <div class="col-6"> 
        <div id="accordion5">
            <div class="card">
                <div class="card-header" id="headingOne"style="background-color: #c3d2e1;">
                    <h5 class="mb-0">
                        <button type="button" class="btn btn-link tabclick text-dark" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                         Size
                        </button>
                    </h5>
                </div>
    
                <div id="collapseFive" class="collapse " aria-labelledby="headingFive" data-parent="#accordion5">
                    <div class="">
    
                        <div class="col-lg-12   my-2">
                         Size
                            <div class="float-right">
                                <i class="fas fa-plus mr-1 pluscolor pro_op" val="Size" val2="Size">
                                    </i>
                                    <i class="fas fa-edit editcolor pro_edit" val="Size" val2="Size" val3="{{$id}}">
                                    </i>
                            </div>
                        </div>
                        
               
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="exampleModal" role="dialog" tabindex="-1">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">
                                Add Product Option
                            </h5>
                            <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                <span aria-hidden="true">
                                    ×
                                </span>
                            </button>
                        </div>
                        <form  method="POST" enctype="multipart/form-data" id="myform">
                        @csrf
                        <div class="modal-body">
                           

              
                                <div class="row p-3">
                                    <div class="col-12 mt-2">
                                        <label>
                                            <b>
                                                Name
                                            </b>
                                        </label>
                                        <br>
                                            <input type="hidden" name="product_id" value="{{$id}}">
                                            <input type="hidden" name="parent" value="" class="pro_vari">
                                            <input type="text" name="chalid" value="" class="pro_vari2">

                                            <input class="form-control mt-1 pro_name" name="name" placeholder="Product Option Name" required="" type="text">
                                            <label>
                                            <b>
                                                Color
                                            </b>
                                        </label>
                                            <input class="form-control mt-1 " name="color"  required="" type="color">
                                            </input>
                                        </br>
                                    </div>
                                   
                                </div>
                            
                        </div>
                        <div class="modal-footer">
                            {{--
                            <button class="btn btn-secondary" data-dismiss="modal" type="button">
                                Close
                            </button>
                            --}}
                            <button class="btn btn-primary btnSubmit" type="submit">
                                Add
                            </button>
                            
                        </div>
                        </form>
                    </div>
                </div>
            </div>
          

            <div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="xlarge" role="dialog" tabindex="-1">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">
                                Update Product Option
                            </h5>
                            <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                <span aria-hidden="true">
                                    ×
                                </span>
                            </button>
                        </div>
                        <form  method="POST" enctype="multipart/form-data" id="myform2">
                        @csrf
                        <div class="modal-body" id="products_op">
                           

              
                                
                            
                        </div>
                        <div class="modal-footer">
                            {{--
                            <button class="btn btn-secondary" data-dismiss="modal" type="button">
                                Close
                            </button>
                            --}}
                            <button class="btn btn-primary btnSubmit2" type="submit">
                                Add
                            </button>
                            
                        </div>
                        </form>
                    </div>
                </div>
            </div>


            <div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="xlarge2" role="dialog" tabindex="-1">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">
                                Update Color Option
                            </h5>
                            <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                <span aria-hidden="true">
                                    ×
                                </span>
                            </button>
                        </div>
                        <form  method="POST" enctype="multipart/form-data" id="myform5">
                        @csrf
                        <div class="modal-body" id="products_op2">
                           

              
                                
                            
                        </div>
                        <div class="modal-footer">
                            {{--
                            <button class="btn btn-secondary" data-dismiss="modal" type="button">
                                Close
                            </button>
                            --}}
                            <button class="btn btn-primary btnSubmit5" type="submit">
                                Add
                            </button>
                            
                        </div>
                        </form>
                    </div>
                </div>
            </div>



            <div aria-hidden="true" aria-labelledby="exampleModaloptionLabel" class="modal fade" id="exampleModaloption" role="dialog" tabindex="-1">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModaloptionLabel">
                                Add Option
                            </h5>
                            <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                <span aria-hidden="true">
                                    ×
                                </span>
                            </button>
                        </div>
                        <form  method="POST" enctype="multipart/form-data" id="myform3">
                        @csrf
                        <div class="modal-body">
                           

              
                                <div class="row p-3">
                                    <div class="col-12 mt-2">
                                        <label>
                                            <b>
                                                Name
                                            </b>
                                        </label>
                                        <br>
                                            <input type="hidden" name="product_id" value="{{$id}}">
                                            <input type="hidden" name="parent" value="Product Option" class="pro_vari">

                                            <input class="form-control mt-1 pro_name" name="child" placeholder="Enter Option Name" required="" type="text">
                                            </input>
                                        </br>
                                    </div>
                                   
                                </div>
                            
                        </div>
                        <div class="modal-footer">
                            {{--
                            <button class="btn btn-secondary" data-dismiss="modal" type="button">
                                Close
                            </button>
                            --}}
                            <button class="btn btn-primary btnSubmit3" type="submit">
                                Add
                            </button>
                            
                        </div>
                        </form>
                    </div>
                </div>
            </div>






            <div aria-hidden="true" aria-labelledby="exampleModalcolorLabel" class="modal fade" id="exampleModalcolor" role="dialog" tabindex="-1">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalcolorLabel">
                                Add Option
                            </h5>
                            <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                <span aria-hidden="true">
                                    ×
                                </span>
                            </button>
                        </div>
                        <form  method="POST" enctype="multipart/form-data" id="myform4">
                        @csrf
                        <div class="modal-body">
                           

              
                                <div class="row p-3">
                                    <div class="col-12 mt-2">
                                        <label>
                                            <b>
                                                Name
                                            </b>
                                        </label>
                                        <br>
                                            <input type="hidden" name="product_id" value="{{$id}}">
                                            <input type="hidden" name="parent" value="Color Version">

                                            <input class="form-control mt-1" name="child" placeholder="Enter Color Name" required="" type="text">
                                            </input>
                                            <label>
                                            <b>
                                                Select Color
                                            </b>
                                        </label>
                                            <input class="form-control mt-1" name="color" required="" type="color">
                                            </input>
                                        </br>
                                    </div>
                                   
                                </div>
                            
                        </div>
                        <div class="modal-footer">
                            {{--
                            <button class="btn btn-secondary" data-dismiss="modal" type="button">
                                Close
                            </button>
                            --}}
                            <button class="btn btn-primary btnSubmit4" type="submit">
                                Add
                            </button>
                            
                        </div>
                        </form>
                    </div>
                </div>
            </div>


















            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>

    $(document).ready(function () {
            $('.pro_op').on('click', function () {
               
                jQuery.noConflict();

               
                var id = $(this).attr('val');
                var id2 = $(this).attr('val2');
                $(".pro_vari").val(id);
                $(".pro_vari2").val(id2);
                 $('.modal-title').empty().append(id);

                
                $('#exampleModal').modal('show');
                


                
            });
            
            $('.prod_op').on('click', function () {
                jQuery.noConflict();
                $('#exampleModaloption').modal('show');

            
            });

            $('.color_ver').on('click', function () {
                jQuery.noConflict();
                $('#exampleModalcolor').modal('show');

            
            });
            
            $('.pro_edit').on('click', function () {

                var id = $(this).attr('val');
                var id2 = $(this).attr('val2');
                var p_id = $(this).attr('val3');
                
                $.ajax({

                    type: 'get',
                    url: '{{URL::to('superadmin/get_edit_product')}}',
                    data: {'id':id,'id2':id2,'p_id':p_id},

                    success: function (data) {
                        jQuery.noConflict();
                        $('#products_op').empty().append(data);
                        $('#xlarge').modal('show');

                    },


                });
            });
            
            $('.pro_edit2').on('click', function () {

                var id = $(this).attr('val');
                var id2 = $(this).attr('val2');
                var p_id = $(this).attr('val3');
                
                $.ajax({

                    type: 'get',
                    url: '{{URL::to('superadmin/get_edit_product2')}}',
                    data: {'id':id,'id2':id2,'p_id':p_id},

                    success: function (data) {
                        jQuery.noConflict();
                        $('#products_op2').empty().append(data);
                        $('#xlarge2').modal('show');

                    },


                });
            });



        
 
    $(".btnSubmit").click(function (event) {
 
        //stop submit the form, we will post it manually.
        event.preventDefault();
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        // Get form
        var data = $('#myform').serializeArray();
        var pro_name=$(".pro_name").val();
    
        console.log(data);
 
      
 
       // disabled the submit button
        $("#btnSubmit").prop("disabled", true);
       
 
            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: '{{URL::to('superadmin/save_product_option')}}',
                data: data,
                success: function (data) {
                    if(data==200)
                    {
                        $('#exampleModal').modal('hide');
                        swal("Success", "Request Submitted Successfully!", "success");
                        
                    }
                    if(data==201)
                    {
                       
                        $('#exampleModal').modal('hide');
                         swal ( "Oops" ,  "Name is Required!" ,  "error" );
                    }
                    

     
                    
     
                },
                error: function (e) {
     
                   swal ( "Oops" ,  "Something went wrong!" ,  "error" )

     
                }
            });
        
        
             
         
 
    });

    $(".btnSubmit2").click(function (event) {
 
       
        event.preventDefault();
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
       
        var data = $('#myform2').serializeArray();
 
     
        console.log(data);
 
      
 
       
        $("#btnSubmit2").prop("disabled", true);
 
        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: '{{URL::to('superadmin/update_product_option')}}',
            data: data,
            success: function (data) {
                $('#xlarge').modal('hide');
                swal("Success", "Request Submitted Successfully!", "success");

 
                
 
            },
            error: function (e) {
 
               swal ( "Oops" ,  "Something went wrong!" ,  "error" )

 
            }
        });
 
    });


    $(".btnSubmit5").click(function (event) {
 
        
    event.preventDefault();
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    var data = $('#myform5').serializeArray();


    console.log(data);




    $("#btnSubmit5").prop("disabled", true);

    $.ajax({
        type: "POST",
        enctype: 'multipart/form-data',
        url: '{{URL::to('superadmin/update_product_option2')}}',
        data: data,
        success: function (data) {
            $('#xlarge2').modal('hide');
            swal("Success", "Request Submitted Successfully!", "success");


            

        },
        error: function (e) {

            swal ( "Oops" ,  "Something went wrong!" ,  "error" )


        }
    });

    });



    $(".btnSubmit3").click(function (event) {
 
       
        event.preventDefault();
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        var data = $('#myform3').serializeArray();


        console.log(data);




        $("#btnSubmit3").prop("disabled", true);

        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: '{{URL::to('superadmin/add_prod_option')}}',
            data: data,
            success: function (data) {
                $('#exampleModaloption').modal('hide');
                swal("Success", "Option Added Successfully!", "success");


                

            },
            error: function (e) {

                swal ( "Oops" ,  "Something went wrong!" ,  "error" )


            }
        });

    });



    $(".btnSubmit4").click(function (event) {
 
       
        event.preventDefault();
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        var data = $('#myform4').serializeArray();


        console.log(data);




        $("#btnSubmit4").prop("disabled", true);

        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: '{{URL::to('superadmin/add_prod_option')}}',
            data: data,
            success: function (data) {
                $('#exampleModalcolor').modal('hide');
                swal("Success", "Color Added Successfully!", "success");


                

            },
            error: function (e) {

                swal ( "Oops" ,  "Something went wrong!" ,  "error" )


            }
        });

    });
 
});
</script>

</script>            