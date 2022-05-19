<html>
    <head>
        <style>
            /** 
                Set the margins of the page to 0, so the footer and the header
                can be of the full height and width !
             **/
            @page {
                margin: 0cm 0cm;
            }

            /** Define now the real margins of every page in the PDF **/
            body {
                margin-top: 5.5cm;
                margin-left: 2cm;
                margin-right: 2cm;
                margin-bottom: 2cm;
                 font-family:"Calibri, sans-serif";
            }

            /** Define the header rules **/
            header {
                position: fixed;
                top: 0cm;
                margin-left:25%;
               
                height: 3cm;
            }

            /** Define the footer rules **/
            footer {
                position: fixed; 
                bottom: 0cm; 
                left: 0cm; 
                right: 0cm;
                height: 2cm;
            }
            .table2,
    .th2,
    .td2 {
        border: 1px solid black;
        border-collapse: collapse;
    }
        </style>
    </head>
    <body>
     <header>
            <img src="{{asset('img/logo.gif')}}" width="70%" height="100%"/>
             <h1 ><b>  Work Order Form</b></h1>
             <p style="color:black;margin: 0px;margin-left: 57px">Order Number:<span style="font-weight: bolder;color:red">{{$data->order_id}}</span></p>
        </header>

        

        <!-- Wrap the content of your PDF inside a main tag -->
        <main style="">

<table class="table" style="width: 100%;">
    <thead>
    <tr>
        {{-- <th scope="col" style="width: 100%;padding-top: 40px;">
            <img src="images/logo.gif" alt="" style="width: 30%;height:200px;margin-top:1%;">


        </th> --}}



    </tr>
    </thead>
    <tbody>
   
    <tr>
        </th>
        <th scope="col" style="width: 100%;padding-top: 10px;">
            <img src="{{asset('upload/'.$data->file)}}" alt="" style="width: 40%;height:300px;">


        </th>

    </tr>

    <tr>
        <th scope="col" style="width: 100%;padding-top: 20px; text-align: center;">
            <i>Artwork is for illustration only. Actual colors may vary slightly and sizing is not to scale</i>


        </th>



    </tr>

    <tr>

        <td scope="row" colspan="2" style="padding-top: 20px;padding-left: 20px;">
            <h2>Product Options</h2>
        </td>
    </tr>

    <tr>
        <td style="padding-left: 20px;">
            <!--<b style="color: red;">Based on product item selected will dedicate options listed below.</b>-->
        </td>
    </tr>
    <tr>
        <td style="padding-top: 10px;padding-left: 20px;width: 100%;">
            <p style="color:red;margin: 0px;"><span style="font-weight: bolder;color:black">Product: </span>{{$data->Product->name}}</p>
        </td>
    </tr>
    @php 
        $collection = collect($data->option);
        $grouped = $collection->groupBy('product_option');
        

        $collection_color = collect($data->option_color);
      
        
        $grouped_color = $collection_color->groupBy('product_option'); 
    @endphp

    @foreach($grouped as $key=>$po_value)
    <tr>
        <td style="padding-left: 20px;">
            <p style="color:red;margin: 0px;"><span style="font-weight: bolder;color:black">{{$key}}:</span> 
                @foreach($po_value as $po_row)
                {{$po_row->option_porperty->property}},
                @endforeach
            </p>
        </td>
    </tr>
    @endforeach
    
    <tr>

        <td scope="row" colspan="2" style="padding-top: 20px;padding-left: 20px;">
            <h2>Additional Notes</h2>
        </td>

    </tr>
    <tr>
        <td style="padding-left: 20px;padding-bottom:5rem;">
            <p style="color:red;margin: 0px;"><span style="font-weight: bolder;color:red">{{$data->notes}}</p>
        </td>
    </tr>

    <tr>
        <th scope="col" style="width: 100%;padding-top: 10px;">
{{--             <img src="images/logo.gif" alt="" style="width: 25%;">
 --}}

        </th>



    </tr>
    <!--<tr>-->
    <!--    <th scope="row" colspan="2">-->
    <!--        <h1 style="padding-top: 8px"><b>  Work Order Form</b></h1>-->


    <!--</tr>-->
    <!--<tr>-->
    <!--    <td style="text-align: center; width: 100%;">-->
    <!--        <p style="color:black;margin: 0px;">Order Number:<span style="font-weight: bolder;color:red">{{$data->order_id}}</span></p>-->
    <!--    </td>-->
    <!--</tr>-->
    <tr>
        <td style="padding-top: 10px; padding-left: 20px;">
            <h2>Color Palettes</h2>
        </td>
    </tr>
    <tr>
        <!--<td>-->
        <!--    <b style="color: red;padding-left: 20px;">Based on product item selected will dictate options listed below.</b>-->
        <!--</td>-->
    </tr>
    @foreach($grouped_color as $key_co=>$co_value)
    <tr>
        <td style="padding-left: 20px;">
            <p style="color:red;margin: 0px;"><span style="font-weight: bolder;color:black">{{$key_co}}:</span> 
                @foreach($co_value as $co_row)
                {{$co_row->option_porperty->property}},
                @endforeach
            </p>
        </td>
    </tr>
    @endforeach
    
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
        @foreach($grouped_color as $key_co=>$co_value)
         @foreach($co_value as $co_row)
        <td style="background-color:{{$co_row->option_porperty->color}};border: 2px solid black;width: 16%; height: 80px;text-align: center;">
            <p style="padding-top: 15px;color: white;">
            </p>

        </td>
        @endforeach
        @endforeach
       
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
            <h2 style="margin: 0px;">Lettering & Numbering</h2>
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
        <td style="padding-left: 20px;padding-top: 3px;">
            <p style="color: red;margin: 0px;"><span style="font-weight: bold;color: black;">Location: </span>{{$row_order_letter->location}}</p>
        </td>
    </tr>
    <tr>
        <td style="padding-left: 20px;padding-top: 3px;">
            <p style="color: red;margin: 0px;"><span style="font-weight: bold;color: black;">Text: </span>{{$row_order_letter->text}}</p>
        </td>
    </tr>
    <tr>
        <td style="padding-left: 20px;padding-top: 3px;">
            <p style="color: red;margin: 0px;"><span style="font-weight: bold;color: black;">Main color: </span>{{$row_order_letter->main_color}}</p>
        </td>
    </tr>
    <tr>
        <td style="padding-left: 20px;padding-top: 2px;">
            <p style="color: red;margin: 0px;"><span style="font-weight: bold;color: black;">Trim color: </span>{{$row_order_letter->trim_color}}</p>
        </td>
    </tr>
    <tr>
        <td style="padding-left: 20px;padding-top: 3px;">
            <p style="color: red;margin: 0px;"><span style="font-weight: bold;color: black;">Font: </span>{{$row_order_letter->font_name}}</p>
        </td>
    </tr>
    <tr>
        <td style="padding-left: 20px;padding-top:3px;padding-bottom:1rem;">
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

<table style="width:100%;page-break-before: always;">    
<tbody>
    <!--<tr>-->
    <!--    <th scope="row" colspan="2">-->
    <!--        <h1 style="padding-top: 8px"><b>  Work Order Form</b></h1>-->


    <!--</tr>-->

    <!--<tr>-->
    <!--    <td style="text-align: center; width: 100%;">-->
    <!--        <p style="color:black;margin: 0px;">Order Number:<span style="font-weight: bolder;color:red">{{$data->order_id}} </span></p>-->
    <!--    </td>-->
    <!--</tr>-->
</tbody>

</table>


@php $ex=explode(",",$data->size3);
                        
    $loc3=explode(",",$data->loc3);
    $file3=explode(",",$data->logo3);

@endphp
@forelse($ex as $key => $value)
    @if($ex[$key]!='Not Given')
<table style="width: 30%;display: ">    
<tbody>
     
    <tr>

        <td scope="row"  style="padding-top: 20px;padding-left: 20px;">
            <h2>Logo</h2>
        </td>
    </tr>                        
                                       
                            
    <tr>
        <td style="padding-left:20px;padding-top:2px;">
            <img src="{{asset('upload/'.$file3[$key])}}" alt="" style="width: 50%;">
        </td>
    </tr>
    <tr>
        <td style="padding-left: 20px;">
            <p style="color: red;margin-top: 3px;"><span style="font-weight: bold;color: black;">- Size:</span>{{$ex[$key]}}</p>
        </td>
    </tr>
    <tr>
        <td style="padding-left: 20px;">
            <p style="color: red;margin-top: 3px;"><span style="font-weight: bold;color: black;"><span style="color: red;">-</span> Location: </span>{{$loc3[$key]}}</p>
        </td>
    </tr>
    
</tbody>

</table>
@endif
                        @empty
                            
                        @endforelse



@if(count($data->roaster)!=0) 
<table style="width:100%;">
<tbody>
    <tr>
        <th scope="col" style="width: 100%;padding-top: 20px;">

          {{--   <img src="images/logo.gif" alt="" style="width: 50%;"> --}}


        </th>



    </tr>
    <!--<tr>-->
    <!--    <th scope="row" colspan="2">-->
    <!--        <h1 style="padding-top: 8px"><b>  Work Order Form</b></h1>-->


    <!--</tr>-->
    <!--<tr>-->
    <!--    <td style="text-align: center; width: 100%;">-->
    <!--        <p style="color:black;margin: 0px;">Order Number:<span style="font-weight: bolder;color:red">{{$data->order_id}}</span></p>-->
    <!--    </td>-->
    <!--</tr>-->
    <tr>
        <td style="padding-top:10px;padding-left:20px;">
{{--             <b style="color: red;">Table where user can add additional lines</b>
 --}}        </td>
    </tr>
   
    <tr>
        <td style="padding-top:10px;padding-left:20px;">
            <h2>Roster</h2>
        </td>
    </tr>
    <tr>
        <td style="padding-left: 20px; width: 100%;padding-right: 20px;">
            @foreach($data->roaster as $roy_detail)
            <table class="table2" style="width: 100%;margin-bottom: 1rem;">
                <thead>
                    <tr class="tr2">
                    <td class="td2" style="border: 2px solid black;padding: 10px;text-align: center;color: red;" colspan="5"><b>{{$roy_detail->name}}</b> </td>
                    
                </tr>
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
                
                @foreach($roy_detail->detail as $row_detail)        
                <tr class="tr2">
                    <td class="td2" style="border: 2px solid black;padding: 10px;text-align: center;color: red;"><b>{{$row_detail->number}}</b> </td>
                    <td class="td2" style="border: 2px solid black;padding: 10px;text-align: center;color: red;"><b>{{$row_detail->name}}</b></td>
                    <td class="td2" style="border: 2px solid black;padding: 10px;text-align: center;color: red;"><b>{{$row_detail->top_size}}</b></td>
                    <td class="td2" style="border: 2px solid black;padding: 10px;text-align: center;color: red;"><b>{{$row_detail->bottom_size}}</b></td>
                    <td class="td2" style="border: 2px solid black;padding: 10px;text-align: center;color: red;"><b>{{$row_detail->notes}}</b></td>

                </tr>
                 @endforeach
                
               





                </tbody>
            </table>
            @endforeach

        </td>
    </tr>

    </tbody>

</table>
@endif
</main>
<!-- <table>
    <tr class="w_100">
        <td class="w_100 text_center">
            <img src="images/logo.gif" alt="">
        </td>
    </tr>
</table> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script type="text/javascript">
    
    

  
</script>
</body>


</html>
