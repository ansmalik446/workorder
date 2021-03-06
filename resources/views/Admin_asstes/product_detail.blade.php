@extends('Admin_asstes.layouts.main')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">

<style>
    .size{
        font-size: 20px;
    }
    .selected{
    text:bold;
    }
    </style>
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page</title>
</head>
<style>
    .table2,
    .th2,
    .td2 {
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>

<body style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">
<section class="app-ecommerce-details">
<div class="card">
<div class="card-header">
<div class="card-body">
<table class="table" style="width: 100%; margin-top: -17px;">
    <thead>
    <tr>
        {{-- <th scope="col" style="width: 100%;padding-top: 40px;">
            <img src="images/logo.gif" alt="" style="width: 30%;height:200px;">


        </th> --}}



    </tr>
    </thead>
    <tbody>
    <tr>
        <th scope="row" colspan="2" style="text-align: center;">
            <h1 style="padding-top: 8px"><b>  Work Order Form</b>


            </h1></th>


    </tr>
    <tr>
        </th>
        <th scope="col" style="width: 100%;padding-top: 10px;text-align: center;">
            <img src="{{asset('upload/'.$data->file)}}" alt="" style="width: 30%;height:200px;">


        </th>

    </tr>

    <tr>
        <th scope="col" style="width: 100%;padding-top: 20px; text-align: center;">
            <i>Artwork is for illustration only. Actual colors may vary slightly and sizing is not to scale</i>


        </th>



    </tr>

    <tr>

        <td scope="row" colspan="2" style="padding-top: 20px;padding-left: 20px;">
            <h1>PRODUCT OPTIONS</h1>
        </td>
    </tr>

    <tr>
        <td style="padding-left: 20px;">
            <b style="color: red;">Based on product item selected will dedicate options listed below.</b>
        </td>
    </tr>
    <tr>
        <td style="padding-top: 10px;padding-left: 20px;width: 100%;">
            <p style="color:red;margin: 0px;"><span style="font-weight: bolder;color:black">Product: </span>{{$data->Product->name}}</p>
        </td>
    </tr>
    <tr>
        <td style="padding-left: 20px;">
            <p style="color:red;margin: 0px;"><span style="font-weight: bolder;color:black">Fabric Choice: </span>{{$data->po1}}</p>
        </td>
    </tr>
    <tr>
        <td style="padding-left: 20px;">
            <p style="color:red;margin: 0px;"><span style="font-weight: bolder;color:black">Neck Style: </span>{{$data->po2}}</p>
        </td>
    </tr>
    <tr>
        <td style="padding-left: 20px;">
            <p style="color:red;margin: 0px;"><span style="font-weight: bolder;color:black">Per Design: </span>{{$data->po3}}</p>
        </td>
    </tr>
    <tr>
        <td style="padding-left: 20px;">
            <p style="color:red;margin: 0px;"><span style="font-weight: bolder;color:black">Shorts Inseam: </span>{{$data->po4}}</p>
        </td>
    </tr>
    <tr>

        <td scope="row" colspan="2" style="padding-top: 20px;padding-left: 20px;">
            <h1>Additional Notes</h1>
        </td>

    </tr>
    <tr>
        <td style="padding-left: 20px;">
            <p style="color:red;margin: 0px;"><span style="font-weight: bolder;color:red">{{$data->notes}}</p>
        </td>
    </tr>

    <tr>
        <th scope="col" style="width: 100%;padding-top: 10px;">
{{--             <img src="images/logo.gif" alt="" style="width: 25%;">
 --}}

        </th>



    </tr>
    <tr>
        <th scope="row" colspan="2" style="text-align: center;">
            <h1 style="padding-top: 8px"><b>  Work Order Form</b></h1>


    </tr>
    <tr>
        <td style="text-align: center; width: 100%;">
            <p style="color:black;margin: 0px;">Order Number:<span style="font-weight: bolder;color:red">{{$data->order_id}}</span></p>
        </td>
    </tr>
    <tr>
        <td style="padding-top: 10px; padding-left: 20px;">
            <h1>Color Palettes</h1>
        </td>
    </tr>
    <tr>
        <td>
            <b style="color: red;padding-left: 20px;">Based on product item selected will dictate options listed below.</b>
        </td>
    </tr>
    <tr>
        <td>
            <p style="color: black;padding-left: 20px;"><span style="font-weight: bold;">Neck:</span>Purple <span style="color: red;">{{$data->co1}}</span></p>
        </td>
    </tr>
    <tr>
        <td>
            <p style="color: black;padding-left: 20px;margin: 0px;"><span style="font-weight: bold;">Accent One: </span> <span style="color: red;">{{$data->co2}}</span></p>
        </td>
    </tr>
    {{-- <tr>
        <td>
            <p style="color: black;padding-left: 20px;margin: 0px;"><span style="font-weight: bold;">Accent Two: </span> <span style="color: red;">Purple(PMS 268) (Drop Down)</span></p>
        </td>
    </tr>
    <tr>
        <td>
            <p style="color: black;padding-left: 20px;margin: 0px;"><span style="font-weight: bold;">Accent Three: </span> <span style="color: red;">Grey(PMS 268) (Drop Down)</span></p>
        </td>
    </tr> --}}
    <tr>
        <td>
            <p style="color: black;padding-left: 20px;margin: 0px;"><span style="font-weight: bold;">BU Logo: </span> <span style="color: red;">{{$data->co3}}</span></p>
        </td>
    </tr>
    <tr>
        <td>
            <p style="color: black;padding-left: 20px;margin: 0px;"><span style="font-weight: bold;">Body : </span> <span style="color: red;">{{$data->co4}}</span></p>
        </td>
    </tr>
    <tr>
        <td style="padding-top: 20px;padding-left: 20px;">
           {{--  <b style="color:red;">Give a select box where user can select the number of colors then choose the colors to
                show below</b> --}}
        </td>
    </tr>
</tbody>

</table>

<table style="margin-left:1%;width: 100%;">
<tbody>
    <tr style="margin-top: 10px; padding-left: 20px;">
        <td style="background-color:{{$data->colo1}};border: 2px solid black;width: 10%; height: 80px;text-align: center;">
            <p style="padding-top: 15px;color: white;">
            </p>

        </td>
        <td style="background-color: {{$data->colo2}}; border: 2px solid black;width: 10%; height: 80px;text-align: center;">
            <p style="padding-top: 15px;color: white;">
            </p>
        </td>
        <td style="background-color: {{$data->colo3}};border: 2px solid black;width: 10%; height: 80px;text-align: center;">
            <p style="padding-top: 15px;color: black;"></p>
        </td>
    </tr>
    
</tbody>

</table>

<table>    
<tbody>
    <tr>
        <td>
            <p style="padding-left: 20px;">Actual colors may vary slightly depending on screen</p>
        </td>
    </tr>
    <tr>
        <td style="padding-left: 20px;">
            <h1 style="margin: 0px;">Lettering & Numbering</h1>
        </td>
    </tr>
    @foreach($data->order_letter as $row_order_letter)
    <tr>
       {{--  <td style="padding-left: 20px;">
            <b style="color: red;">User can click button to add a text grouping which will create a group of
                options like below</b>
        </td> --}}
    </tr>
    <tr>
        <td style="padding-left: 20px;padding-top: 10px;">
            <p style="color: red;margin: 0px;"><span style="font-weight: bold;color: black;">Location: </span>{{$row_order_letter->location}}</p>
        </td>
    </tr>
    <tr>
        <td style="padding-left: 20px;padding-top: 10px;">
            <p style="color: red;margin: 0px;"><span style="font-weight: bold;color: black;">Text: </span>{{$row_order_letter->text}}</p>
        </td>
    </tr>
    <tr>
        <td style="padding-left: 20px;padding-top: 10px;">
            <p style="color: red;margin: 0px;"><span style="font-weight: bold;color: black;">Main color: </span>{{$row_order_letter->main_color}}</p>
        </td>
    </tr>
    <tr>
        <td style="padding-left: 20px;padding-top: 10px;">
            <p style="color: red;margin: 0px;"><span style="font-weight: bold;color: black;">Trim color: </span>{{$row_order_letter->trim_color}}</p>
        </td>
    </tr>
    <tr>
        <td style="padding-left: 20px;padding-top: 10px;">
            <p style="color: red;margin: 0px;"><span style="font-weight: bold;color: black;">Font: </span>{{$row_order_letter->font_name}}</p>
        </td>
    </tr>
    <tr>
        <td style="padding-left: 20px;padding-top: 10px;">
            <p style="color: red;margin: 0px;"><span style="font-weight: bold;color: black;">Size (inches): </span>{{$row_order_letter->size}}</p>
        </td>
    </tr>
    @endforeach
    <tr>
        <th scope="col" style="width: 100%;padding-top: 10px;">
           {{--  <img src="images/logo.gif" alt="" style="width: 25%;"> --}}


        </th>



    </tr>
</tbody>

</table>

<table style="width:100%">    
<tbody>
    <tr>
        <th scope="row" colspan="2" style="text-align: center;" style="text-align: center;">
            <h1 style="padding-top: 8px" ><b>  Work Order Form</b></h1>


    </tr>

    <tr>
        <td style="text-align: center; width: 100%;">
            <p style="color:black;margin: 0px;">Order Number:<span style="font-weight: bolder;color:red">{{$data->order_id}} </span></p>
        </td>
    </tr>
</tbody>

</table>

<table style="width: 30%;display: ">    
<tbody>
    <tr>
        <td style="padding-left:20px">
            <h1>Logos</h1>
        </td>
    </tr>
    <tr>
        {{-- <td style="padding-left:20px">
            <b style="color: red;">Upload Button with text field for size</b>
        </td> --}}
    </tr>
    <tr>
        <td style="padding-left:20px;padding-top: 30px;">
            <img src="{{asset('upload/'.$data->logo1)}}" alt="" style="width: 50%;">
        </td>
    </tr>
    <tr>
        <td style="padding-left: 20px;">
            <p style="color: red;"><span style="font-weight: bold;color: black;">- Size</span>{{$data->size1}}</p>
        </td>
    </tr>
    <tr>
        <td style="padding-left: 20px;">
            <p style="color: red;"><span style="font-weight: bold;color: black;"><span style="color: red;">-</span> Location: </span>{{$data->loc1}}</p>
        </td>
    </tr>
</tbody>

</table>

<table style="width: 30%;display: ">    
<tbody>
    <tr>
        <td style="padding-left:20px;padding-top: 30px;">
            <img src="{{asset('upload/'.$data->logo1)}}" alt="" style="width: 50%;">
        </td>
    </tr>
    <tr>
        <td style="padding-left: 20px;">
            <p style="color: red;"><span style="font-weight: bold;color: black;">- Size</span>{{$data->size2}}</p>
        </td>
    </tr>
    <tr>
        <td style="padding-left: 20px;">
            <p style="color: red;"><span style="font-weight: bold;color: black;"><span style="color: red;">-</span> Location: </span>{{$data->loc2}}o</p>
        </td>
    </tr>
</tbody>

</table>

<table style="width: 30%;">    
<tbody>
    <tr>
        <td style="padding-left:20px;padding-top: 30px;">
            <img src="{{asset('upload/'.$data->logo3)}}" alt="" style="width: 50%;">
        </td>
    </tr>
    <tr>
        <td style="padding-left: 20px;">
            <p style="color: red;"><span style="font-weight: bold;color: black;">- Size</span>{{$data->size3}}</p>
        </td>
    </tr>
    <tr>
        <td style="padding-left: 20px;">
            <p style="color: red;"><span style="font-weight: bold;color: black;"><span style="color: red;">-</span> Location: </span>{{$data->loc3}}</p>
        </td>
    </tr>
</tbody>

</table>

<table style="width:100%;">
<tbody>
    <tr>
        <th scope="col" style="width: 100%;padding-top: 20px;">

          {{--   <img src="images/logo.gif" alt="" style="width: 50%;"> --}}


        </th>



    </tr>
    <tr>
        <th scope="row" colspan="2" style="text-align: center;">
            <h1 style="padding-top: 8px"><b>  Work Order Form</b></h1>


    </tr>
    <tr>
        <td style="text-align: center; width: 100%;">
            <p style="color:black;margin: 0px;">Order Number:<span style="font-weight: bolder;color:red">{{$data->order_id}}</span></p>
        </td>
    </tr>
    <tr>
        <td style="padding-top:10px;padding-left:20px;">
{{--             <b style="color: red;">Table where user can add additional lines</b>
 --}}        </td>
    </tr>
    <tr>
        <td style="padding-top:10px;padding-left:20px;">
            <h1>Roster</h1>
        </td>
    </tr>
    <tr>
        <td style="padding-left: 20px; width: 100%;padding-right: 20px;">
            <table class="table2" style="width: 100%;">
                <thead>
                <tr class="tr2">
                    <th class="th2" style="border: 2px solid black;padding: 10px;text-align: center;">Number</th>
                    <th class="th2" style="border: 2px solid black;padding: 10px;text-align: center;">Name</th>
                    <th class="th2" style="border: 2px solid black;padding: 10px;text-align: center;">Top Size
                    </th>
                    <th class="th2" style="border: 2px solid black;padding: 10px;text-align: center;">Bottom Size
                    </th>
                    <th class="th2" style="border: 2px solid black;padding: 10px;text-align: center;">Notes</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data->roaster as $roy_detail)
                @foreach($roy_detail->detail as $row_detail)        
                <tr class="tr2">
                    <td class="td2" style="border: 2px solid black;padding: 10px;text-align: center;color: red;"><b>{{$row_detail->number}}</b> </td>
                    <td class="td2" style="border: 2px solid black;padding: 10px;text-align: center;color: red;"><b>{{$row_detail->name}}</b></td>
                    <td class="td2" style="border: 2px solid black;padding: 10px;text-align: center;color: red;"><b>{{$row_detail->top_size}}</b></td>
                    <td class="td2" style="border: 2px solid black;padding: 10px;text-align: center;color: red;"><b>{{$row_detail->bottom_size}}</b></td>
                    <td class="td2" style="border: 2px solid black;padding: 10px;text-align: center;color: red;"><b>{{$row_detail->notes}}</b></td>

                </tr>
                 @endforeach
                @endforeach
               





                </tbody>
            </table>

        </td>
    </tr>

    </tbody>

</table>
<!-- <table>
    <tr class="w_100">
        <td class="w_100 text_center">
            <img src="images/logo.gif" alt="">
        </td>
    </tr>
</table> -->
</div>
</div>
</div>
</section>
    
       
</body>

</html>
@endsection