@extends('user.layout.header')


<link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<style>
    .table2,
    .th2,
    .td2 {
        border: 1px solid black;
        border-collapse: collapse;
    }
.padrem-5{
    min-height: 308px!important;
}
.Border_1{
    min-height: 350px!important;
}
    section.productFeatures {
    background-color: #e5e5e5ba;
}
    
</style>

@section('content')
<section class="productFeatures">

    <div class="container-fluid pre_record">
        <div class=" align-items-center pl-4 ">
            {{-- <a href="{{url('rosters')}}"> <input type="button" value="Roster" class="btn btn-success mr-2 bg-success"></a> --}}
            {{-- <a href="{{url("print")}}"> <input type="button" value="print" class="btn btn-primary mr-2"></a> --}}
        </div>
        <form action="{{url('admins/add/edit_updat_order/' .$pre_data->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12 pt-5">


            </div>
            <!-- Place order section -->
            <div class="col-md-6 col-lg-3 col-12  placeOrder px-0">
                <div class="orderDetails px-5 py-5">
                    
                        <div class="form-group">
                            <label for="team"><b>Team:</b></label>
                            <input type="text" class="form-control form-control-sm" id="team" name="team_name" value="{{$pre_data->team_name}}">
                            <input type="hidden" class="form-control form-control-sm pro_id" id="" name="pro_id" value="{{$id}}">

                        </div>
                        <div class="form-group">
                            <label for="orderNumber"><b>Order Number:</b></label>
                            <input type="number" class="form-control form-control-sm" name="order_id" value="{{$pre_data->order_id}}" id="orderNumber" >
                            
                        </div>
                        <div class="form-group">
                            <label for="orderNumber"><b>WO ID:</b></label>
                            @php
                            $rand=rand(11111, 99999);@endphp
                            <input type="number" class="form-control form-control-sm" name="wo_id" value="{{$pre_data->wo_id}}"  readonly>
                        </div>
                        <div class="pt-2">
                            <div class="form-group">
                                <label for="location"><b>Reorder:</b></label>
                                <input type="checkbox" class="reorder_check" id="reorder_check">
                            </div>
                            <div class="form-group">
                                <label for="previousOrderNum"><b>Previous Order Number:</b></label>
                                <input type="text" class="form-control form-control-sm reorder" id="previousOrderNum" disabled>
                            </div>
                        </div>


                    

                   {{--  <a href="{{ url('rosters') }}"> <input type="button" value="Roster" class="btn btn-success mr-2 bg-info float-right"></a>
                    <a href="{{ url('rosters') }}"> <input type="button" value="Print" class="btn btn-success mr-2 bg-danger float-right"></a> --}}
                   

                </div>
                <div class="uploadArtwork text-center pt-5">
                    <h6>Upload Artwork</h6>
                    <div class="uploadLogo mt-2 p-2">
                        <input name="file" type="file" class="dropify" data-height="100" data-default-file="{{asset('upload/'.$pre_data->file)}}"  />

                        <input name="pre_file" type="hidden" value="{{$pre_data->file}}"  />
                        {{-- <img src="./img/uploadicon.png" class="img-fluid"> --}}
                    </div>
                    <button type="button" class="btn btn-info submit_form btn1"  val="1">Save/Print</button>
                    <button type="button" class="btn btn-info submit_form btn2" val="2">Roaster</button>
                    
                    <a href="{{ url('admins/')}}"><h1 class="print_btn3 d-none  mr-2"></h1></a>
            

                    <input type="submit" value="Print And Save" name="btn_val" class="btn btn-primary print_btn1 d-none" formtarget="_blank">
                    <input type="submit" value="roster" name="btn_val" class="btn btn-success print_btn2 d-none">


                </div>
            </div>
            <!-- Place order section -->


            <!-- Product and color section -->
            <div class="col-12 col-md-6 col-lg-3  pl-md-5 pr-4 py-5">

                <div class="productOptions">
                    <h3 class="productHeading pt-3 text-center">Product Options</h3>
                    <div class="px-3 py-2">
                        <div class="form-group row">
   
    
                                    <label for="location" class="col-sm-6 "><b>Product:</b></label>
                                    <div class="col-sm-6 pl-xs-3 pl-md-0" style="">
                                        
                                    
                                    {{$products->name}}
                                    </div>
                               
                                
                            </div>
                        
                             
                        @php
                        $po=0;
                        
                        $child=0;
                        $get_po=array();
                        
                            $fabric=$pre_data->option;
                            $collection = collect($fabric);
                            foreach($collection as $row_collection)
                            {
                               
                                $get_po[]=intval($row_collection->poductid);


                            }
                                            
                        @endphp
                                      
                        @foreach ($product_option as $key => $value)


                        
                            <div class="form-group row">
   
    
                                    <label for="location" class="col-sm-6"><b>{{$key}}:</b></label>
                                    <div class="col-sm-6 pl-xs-3 pl-md-0" style="">
                                        <input type="hidden" name="key[{{$child}}]" value="{{$key}}">
                                        <select name="po1[{{$po}}][]" class="select2-multiple form-control form-control-sm" aria-label=".form-control-sm example" multiple="multiple">
                                        @foreach($value as $propr3)    
                                               <option value="{{$propr3->id}}"  {{ in_array($propr3->id,$get_po, TRUE) ? 'selected' : '' }} >{{$propr3->property}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                               
                                
                            </div>
                            @php
                        $po++;
                        $child++;

                        @endphp
                        @endforeach  
                         
                        <div class="">

                            <div class="form-group">
                                <label for="location" class=""><b>Additional Notes:</b></label>
                                <div class="">
                                <textarea class="form-control" id="notes" rows="3"  name="notes">{{$pre_data->notes}}</textarea>
                            </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col pt-5">
                        <div class="colorOptions">
                            <h3 class="optionsHeading pt-3 text-center">Color Options</h3>
                            <div class="px-3 py-2">
                                @php
                                    $co=0;
                                
                                    $child2=0;

                                    $get_co=array();
                        
                                    $col=$pre_data->option_color;
                                    $collection_col = collect($col);
                                    foreach($collection_col as $row_collection_col)
                                    {
                                       
                                        $get_co[]=intval($row_collection_col->poductid);


                                    }
                                    //dd($get_co);
                                @endphp
                                @foreach($color_version as $key => $value)

                                    <div class="form-group row">
   
    
                                        <label for="location" class="col-sm-5 mr-2"><b>{{$key}}:</b></label>
                                        <div class="col-sm-6 pl-xs-3 pl-md-0" style="">
                                        <input type="hidden" name="key2[{{$child2}}]" value="{{$key}}">
                                            @php
                                            $bu=str_replace(' ', '', $key);

                                            @endphp
                                            <select name="co1[{{$co}}][]" class="clrop select2-multiple form-control form-control-sm" aria-label=".form-control-sm example" multiple="multiple" data-val4=".{{$bu}}"  data-val3="{{$bu}}">
                                        
                                                @foreach($value as $list5)    
                                                
                                                    <option value="{{$list5->id}}" data-val2="{{$list5->color}}"  data-val3="{{$bu}}" {{ in_array($list5->id,$get_co, TRUE) ? 'selected' : '' }}>{{$list5->property}}</option>
                                                @endforeach
                                            </select>
                                        
                                        </div>
                                        
                                    </div>
                                    @php
                                    $co++;
                                    $child2++;

                                    @endphp
                                @endforeach 
                             



                                
                                <div class="form-group">                            
                                    <div class="m-auto colortable">
                                        <div class="row ttr" style="padding: 10%; margin: auto;">
                                            @foreach($pre_data->option_color as $code)
                                            <div class='th2 p-2 colo'><input type='color' value="{{$code->option_porperty->color}}"></div>
                                            @endforeach

                                            
                                        </div>
                                    </div>
                                </div>
                               


                                

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Product and color section -->

            <!-- Lettering and Logos -->

            <div class="col-lg-6 col-12  py-5">

                
                <div class="lettering">
                    <div class="row">
                        <div class="col-12 pt-2 pb-4">
                            <h3 class="text-center">Lettering</h3>
                        </div>
                        <div class="col-12">
                            <div action="" class="d-flex justify-content-center">
                                <div class="d-flex pr-md-5">
                                    {{-- <button class="btn-none" id="btn_text" type="button"><i class="fas fa-plus"></i>&nbsp; Add New Text</button>&nbsp; --}}
                                    <button class="btn" id="btn_text" type="button" ><i class="fas fa-plus"></i>&nbsp; Add New Text</button>&nbsp;

                                </div>

                                <div class="d-flex">
                                    {{-- <button class="btn-none" id="btn_number" type="button"><i class="fas fa-plus"></i>&nbsp;  Add New Number</button>&nbsp; --}}
                                    <button class="btn" id="btn_number" type="button"><i class="fas fa-plus"></i>&nbsp; Add New Number</button>&nbsp;

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row px-5 py-5" id="div_append">
                        @php $f=0; @endphp
                        @foreach($pre_data->order_letter as $row_order_letter)
                        
                        <div class="col-md-6 pb-5 pt-2 add-new-product1" id="removeTr"  val='1'>

                            <div class="row">
                                <div class="col-md-12 px-3 Border_1">
                                     <button class="float-right btn-none" id="deletebtn"><i class="fas fa-trash" style="color: red"></i></button><br>



                                    <div class="form-group row">
   
    
                                        <label for="location" class="col-sm-6"><b>Location:</b></label>
                                        <div class="col-sm-6 pl-xs-3 pl-md-0" style="">
                                            <input type="text" class="form-control form-control-sm" id="location" name="location[{{$f}}]" value="{{$row_order_letter->location}}">
                                       
                                        </div>
                                        
                                    </div>
                                    @if($row_order_letter->type=='text') 
                                     <div class="form-group row">
   
    
                                        <label for="location" class="col-sm-6"><b>Text:</b></label>
                                        <div class="col-sm-6 pl-xs-3 pl-md-0" style="">
                                               
                                            <input type="text" class="form-control form-control-sm " name="text[{{$f}}]" id="location" value="{{$row_order_letter->text}}">

                                            <input type="hidden" class="form-control form-control-sm" name="type[{{$f}}]" value="text">

                                        </div>
                                       
                                    </div>
                                    @else
                                            <input type="hidden" class="form-control form-control-sm" name="type[{{$f}}]" value="nontext">
                                    @endif
                                    <div class="form-group row">
   
    
                                        <label for="location" class="col-sm-6"><b>Font Name:</b></label>
                                        <div class="col-sm-6 pl-xs-3 pl-md-0" style="">
                                            <input type="text" name="font_name[{{$f}}]" value="{{$row_order_letter->font_name}}" class="form-control form-control-sm">
                                       
                                        </div>
                                       
                                    </div>
                                    <div class="form-group row">
   
    
                                        <label for="location" class="col-sm-6"><b>Main Color:</b></label>
                                        <div class="col-sm-6 pl-xs-3 pl-md-0" style="">

                                            @php
                                                $main_color=explode(",",$row_order_letter->main_color);
                                            @endphp
                                            
                                            <select class="select2-multiple form-control form-control-sm" aria-label=".form-control-sm example"  name="main_color[{{$f}}][]" multiple="multiple">

                                        
                                                @foreach($data as $row)
                                                @if($row->parent=='Color' && $row->chalid=='Color')
                                                <option value="{{$row->id}}"
                                                    {{ in_array($row->property,$main_color, TRUE) ? 'selected' : '' }}

                                                    >{{$row->property}}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                       
                                        </div>
                                       
                                    </div>
                                   

                                    <div class="form-group row">
   
    
                                        <label for="location" class="col-sm-6"><b>Trim Color:</b></label>
                                        <div class="col-sm-6 pl-xs-3 pl-md-0" style="">
                                            @php
                                                $trim_color=explode(",",$row_order_letter->trim_color);
                                            @endphp
                                            <select class="select2-multiple form-control form-control-sm" aria-label=".form-control-sm example" name="trim_color[{{$f}}][]" multiple="multiple">

                                        
                                                @foreach($data as $row)
                                                @if($row->parent=='Color' && $row->chalid=='Color')
                                                <option value="{{$row->id}}"
                                                    {{ in_array($row->property,$trim_color, TRUE) ? 'selected' : '' }}
                                                    >{{$row->property}}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                        
                                        </div>
                                       
                                    </div>

                                    <div class="form-group row">
   
    
                                        <label for="location" class="col-sm-6"><b>Size:</b></label>
                                        <div class="col-sm-6 pl-xs-3 pl-md-0" style="">
                                            @php
                                                $size=explode(",",$row_order_letter->size);
                                            @endphp
                                            <select class="select2-multiple form-group  form-control" aria-label=".form-control-sm example" name="size[{{$f}}][]" multiple="multiple" style="padding: 0.375rem 0.75rem!important;">

                                        
                                                @foreach($data as $row)
                                                @if($row->parent=='Size' && $row->chalid=='Size')
                                                <option value="{{$row->id}}"
                                                    {{ in_array($row->property,$size, TRUE) ? 'selected' : '' }}>{{$row->property}}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                        
                                        </div>
                                       
                                    </div>

                                </div>
                            </div>


                        </div>
                        @php $f++; @endphp 

                        @endforeach
                        <div class="add-new-product3" val2="{{$f}}"></div>


                    </div>
                </div>

                <div class="logos mt-5 pt-5 bg-white">
                    <div class="row px-3">
                        <div class="col-12 pt-2 pb-4">
                            <h3 class="text-center">Logo</h3>
                            <button class="btn btn-info add_logo" type="button">Add Logo</button>
                        </div>
                    </div>
                        
                    <div class="row px-3 append_logo">
                        
                        @php $ex=explode(",",$pre_data->size3);
                        
                        $loc3=explode(",",$pre_data->loc3);
                        $file3=explode(",",$pre_data->logo3);

                        @endphp
                        @forelse($ex as $key => $value)
                            @if($ex[$key]!='Not Given')
                            <div class="col-4 border-right deleterow p-3">
                                
                                    <div class="card border-0">
                                        {{-- <img class="img-fluid" src="./img/uploadicon.png" alt="Upload Logo"> --}}
                                        <button class="float-right btn-none" id="deletelogo" type="button"><i class="fas fa-trash" style="color: red;float:right"></i></button><br>
                                        <input name="prev_file3[]" type="hidden" value="{{$file3[$key]}}" />
                                        <input name="file3[]" type="file" class="dropify" data-height="100" data-default-file="{{asset('upload/'.$file3[$key])}}" />
                                        <div class="card-body">
                                            <h5 class="card-title">Upload Logo</h5>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="product"><b>Location:</b></label>
                                        <input type="text" class="form-control form-control-sm" name="loc3[]" value="{{$loc3[$key]}}" id="location">
                                    </div>

                                    <div class="form-group">
                                        <label for="size" class=""><b>Size:</b></label>
                                        <select class="form-control form-control-sm" name="size3[]" aria-label=".form-control-sm example">
                                            <option value="">Select</option>

                                           @foreach($data as $row)
                                                    @if($row->parent=='Size' && $row->chalid=='Size')
                                                    <option value="{{$row->id}}" {{ ( $row->property == $ex[$key]) ? 'selected' : '' }}>{{$row->property}}</option>
                                                    @endif
                                                    @endforeach
                                        </select>
                                    </div>
                                
                            </div>
                            @endif
                        @empty
                            
                        @endforelse    
                       

                        
                    </div>
                </div>
                <!-- Lettering and Logos -->

            </div>

        </div>
    </form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" defer></script>
<!-- <script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script> -->

<script>
    $(document).ready(function() {
        // Select2 Multiple
        $('.select2-multiple').select2({
            placeholder: "Select",
             width: 'resolve',
            allowClear: true
        });
    });
</script>
<script>
    $('.dropify').dropify();
</script>
<script>
    $(document).ready(function() {
        $(document).on('change', '.clrop', function() {
           
            
            $(".colo").remove();


            var val2 =$('option:selected', this).attr('data-val2');
            $('.clrop option:selected').each(function() {
                var code=$(this).attr('data-val2');
               
               
                var inpt ="<div class='th2 p-2 colo'><input type='color' value='" + code + "'></div>"; 
                $(".ttr").append(inpt);
            });          
            
              

               
           

            
            

        });
        $('#btn_text').click(function() {
            var val = $(".add-new-product1").attr('val');
            
            val++;
            var val2 =$(".add-new-product3").attr('val2');
            val2++;
            $(".add-new-product3").attr('val2', val2);
            $(".add-new-product1").attr('val', val);
            
            
            var html = `
            <div class="col-md-6 pb-3  add-new-product1 mt-3" id="removeTr" val='` + val + `'>
                <div class="row">
                    <div class="col-md-12 px-3 Border_1">
                        <button class="float-right btn-none" id="deletebtn"><i class="fas fa-trash" style="color: red"></i></button><br>


                            <div class="form-group row">
                               
                                
                                    <label for="location" class="col-sm-6"><b>Location:</b></label>
                                    <div class="col-sm-6 pl-xs-3 pl-md-0" style="">
                                    
                                    <input type="text" class="form-control form-control-sm" id="location" name="location[`+ val2 +`]">
                                </div>
                                
                            </div>
                            <div class="form-group row">
                               
                                
                                    <label for="location" class="col-sm-6"><b>Text:</b></label>
                                    <div class="col-sm-6 pl-xs-3 pl-md-0" style="">



                                   
                                    <input type="text" class="form-control form-control-sm " id="location" name="text[`+ val2 +`]">
                               
                                </div>
                                <input type="hidden" class="form-control form-control-sm" name="type[`+ val2 +`]" value="text">
                               
                            </div>
                            <div class="form-group row">
                                    <label for="location" class="col-sm-6"><b>Font Name:</b></label>
                                    <div class="col-sm-6 pl-xs-3 pl-md-0" style="">
                                    <input type="text" class="form-control form-control-sm" name="font_name[`+ val2 +`]">
                                
                                </div>
                               
                            </div>
                            <div class="form-group row">
                               
                                
                                    <label for="location" class="col-sm-6"><b>Main Color:</b></label>
                                    <div class="col-sm-6 pl-xs-3 pl-md-0" style=""> 
                                    <select class="select2-multiple form-control form-control-sm" aria-label=".form-control-sm example" multiple="multiple" name="main_color[`+ val2 +`][]">

                                
                                        @foreach($data as $row)
                                        @if($row->parent=='Color' && $row->chalid=='Color')
                                        <option value="{{$row->id}}">{{$row->property}}</option>
                                        @endif
                                        @endforeach
                                    </select>

                                </div>
                               
                            </div>
                            <div class="form-group row">
                               
                                
                                    <label for="location" class="col-sm-6"><b>Trim Color:</b></label>
                                    <div class="col-sm-6 pl-xs-3 pl-md-0" style="">
                              
                                    <select class="select2-multiple form-control form-control-sm" aria-label=".form-control-sm example" multiple="multiple" name="trim_color[`+ val2 +`][]">

                                
                                        @foreach($data as $row)
                                        @if($row->parent=='Color' && $row->chalid=='Color')
                                        <option value="{{$row->id}}">{{$row->property}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                             
                                </div>
                               
                            </div>

                            <div class="form-group row">
                                    <label for="location" class="col-sm-6"><b>Size:</b></label>
                                    <div class="col-sm-6 pl-xs-3 pl-md-0" style="">
                                    <select class="select2-multiple form-group  form-control" aria-label=".form-control-sm example" multiple="multiple" style="padding: 0.375rem 0.75rem!important;" name="size[`+ val2 +`][]">

                                
                                        @foreach($data as $row)
                                        @if($row->parent=='Size' && $row->chalid=='Size')
                                        <option value="{{$row->id}}">{{$row->property}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                
                                </div>
                               
                            </div>
                    
                    </div>
                </div>
            </div>
            `;
            var tableBody = $("#div_append").append(html);
            $('.select2-multiple').select2();

        });
        $(document).on('click', '#deletebtn', function() {
            var val2 =$(".add-new-product3").attr('val2');
            val2--;
            $(".add-new-product3").attr('val2', val2);
            $(this).closest('#removeTr').remove();
        });
        $('#btn_number').click(function() {
            var val = $(".add-new-product2").attr('val');
            var val2 =$(".add-new-product3").attr('val2');
            val++;
            val2++;
            $(".add-new-product2").attr('val', val);
            $(".add-new-product3").attr('val2', val2);
            var html = `
                <div class="col-md-6 pb-5 mt-3 add-new-product2" id="removeTr2" val='1'>

                

                            <div class="row ">

                                <div class="col-12 px-3 Border_1 padrem-52">
                                    
                                    <button class="float-right btn-none" id="deletebtn"><i class="fas fa-trash" style="color: red"></i></button><br>
                                    <div class="form-group row">
   
    
                                        <label for="location" class="col-sm-6"><b>Location:</b></label>
                                        <div class="col-sm-6 pl-xs-3 pl-md-0" style="">
                                           
                                            <input type="text" class="form-control form-control-sm " id="location" name="location[`+ val2 +`]">
                                        
                                        </div>
                                        
                                    </div>
                                    <div class="form-group row">
   
    
                                        <label for="location" class="col-sm-6"><b>Font Name:</b></label>
                                        <div class="col-sm-6 pl-xs-3 pl-md-0" style="">
                                            <input type="text" class="form-control form-control-sm" name="font_name[`+ val2 +`]">
                                            <input type="hidden" class="form-control form-control-sm" name="type[`+ val2 +`]" value="nontext">
                                        </div>
                                        
                                    </div>

                                    <div class="form-group row">
   
    
                                        <label for="location" class="col-sm-6"><b>Main Color:</b></label>
                                        <div class="col-sm-6 pl-xs-3 pl-md-0" style="">

                                            
                                            <select class="select2-multiple form-control form-control-sm" aria-label=".form-control-sm example" multiple="multiple" name="main_color[`+ val2 +`][]">

                                        
                                                @foreach($data as $row)
                                                @if($row->parent=='Color' && $row->chalid=='Color')
                                                <option value="{{$row->id}}">{{$row->property}}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                        </div>
                                       
                                    </div>
                                   <div class="form-group row">
   
    
                                        <label for="location" class="col-sm-6"><b>Trim Color:</b></label>
                                        <div class="col-sm-6 pl-xs-3 pl-md-0" style="">
                                            
                                            <select class="select2-multiple form-control form-control-sm" aria-label=".form-control-sm example" multiple="multiple" name="trim_color[`+ val2 +`][]">

                                        
                                                @foreach($data as $row)
                                                @if($row->parent=='Color' && $row->chalid=='Color')
                                                <option value="{{$row->id}}">{{$row->property}}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                        </div>
                                      
                                       
                                    </div>

                                    <div class="form-group row">
   
    
                                        <label for="location" class="col-sm-6"><b>Size:</b></label>
                                        <div class="col-sm-6 pl-xs-3 pl-md-0" style="">

                                           
                                            <select class="select2-multiple form-control form-control-sm" aria-label=".form-control-sm example" multiple="multiple" name="size[`+ val2 +`][]">

                                        
                                                @foreach($data as $row)
                                                @if($row->parent=='Size' && $row->chalid=='Size')
                                                <option value="{{$row->id}}">{{$row->property}}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                       
                                        </div>
                                      
                                    </div>

                                </div>
                            </div>



                        </div>

                `;
            var tableBody = $("#div_append").append(html);
            $('.select2-multiple').select2();
        });
            $(document).on('click', '.reorder_check', function() {
                var check_val =document.getElementById("reorder_check");
                
                 console.log(check_val);
                 if (check_val.checked == true )
                {
                    
                    $(".reorder").attr('disabled',false); 

                } 
                else {
                    $(".reorder").attr('disabled',true ); 

                }   
               

               
            });
            $('.reorder').on('change', function () {
                // var value=$(this).val();
                var id = $(this).val();
                var pro_id = $(".pro_id").val();
                
                $.ajax({

                    type: 'get',
                    url: '{{URL::to('admins/get_previous')}}',
                    data: {'id': id,'pro_id':pro_id},

                    success: function (data) {

                        $('.pre_record').empty().append(data);

                    },


                });
            });

                

               
        
        $(document).on('click', '#deletebtn2', function() {
            
            var val2 =$(".add-new-product3").attr('val2');
            val2--;
            $(".add-new-product3").attr('val2', val2);
            $(this).closest('#removeTr2').remove();
        });
        $(document).on('click', '.add_logo', function() {
            var html=`<div class="col-4 border-right deleterow p-3">
                            
                                <div class="card border-0">
                                    {{-- <img class="img-fluid" src="./img/uploadicon.png" alt="Upload Logo"> --}}
                                    <button class="float-right btn-none" id="deletelogo" type="button"><i class="fas fa-trash" style="color: red;float:right"></i></button><br>
                                    <input name="file3[]" type="file" class="dropify" data-height="100" />
                                        <input name="prev_file3[]" type="hidden" value="" />

                                    <div class="card-body">
                                        <h5 class="card-title">Upload Logo</h5>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="product"><b>Location:</b></label>
                                    <input type="text" class="form-control form-control-sm" name="loc3[]" id="location">
                                </div>

                                <div class="form-group">
                                    <label for="size" class=""><b>Size:</b></label>
                                    <select class="form-control form-control-sm" name="size3[]" aria-label=".form-control-sm example">
                                        <option value="">Select</option>

                                       @foreach($data as $row)
                                                @if($row->parent=='Size' && $row->chalid=='Size')
                                                <option value="{{$row->id}}">{{$row->property}}</option>
                                                @endif
                                                @endforeach
                                    </select>
                                </div>
                            
                        </div>`;

                        $('.dropify').dropify();
                        $(".append_logo").append(html);
                        $('.dropify').dropify();
             
        });
        
         $(document).on('click', '#deletelogo', function() {
             
            $(this).closest('.deleterow').remove();
        });
        $(document).on('click', '.submit_form', function() {

         var val = $(this).attr('val');
        

       
        

        $(this).text("Loading....");
              
               
        if(val==1)
        {
            $(".print_btn1").click();
            $(".print_btn3").click();
            

        }
        else{
            $(".print_btn2").click();

        }

                           
                       
             
        });
    });
</script>
@endsection