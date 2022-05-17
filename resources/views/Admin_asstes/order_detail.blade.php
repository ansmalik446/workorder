@extends('user.layout.header')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">
<style>
    .table2,
    .th2,
    .td2 {
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>

@section('content')

<section class="productFeatures">
    <div class="container-fluid">
        <div class="row">
          <!-- Place order section -->
            <div class="col-md-6 col-lg-3 col-12 greyWhiteGradiant placeOrder px-0">
                <div class="orderDetails px-5 py-5">
                  <form>
                    <div class="form-group">
                      <label for="team"><b>Team:</b></label>
                      <input type="text" class="form-control form-control-sm" id="team" value="BrownTech">
                    </div>
                    <div class="form-group">
                      <label for="orderNumber"><b>Order Number:</b></label>
                      <input type="text" class="form-control form-control-sm" id="orderNumber" value="342104567">
                    </div>
                    <div class="">
                    <label for="ID"><b>WO ID:</b><span class="pl-2">auto generate code</span></label>
                  </div>
                    <div class="pt-2">
                      <div class="form-group">
                      <label for="location"><b>Reorder:</b></label>
                      <input type="checkbox">
                    </div>
                    <div class="form-group">
                      <label for="previousOrderNum"><b>Previous Order Number:</b></label>
                      <input type="text" class="form-control form-control-sm" id="previousOrderNum" value="34500">
                    </div></div>

                      <div class="d-flex">
                          <a href="{{url('rosters')}}">  <input type="button" value="save" class="btn btn-success mr-2 bg-success"></a>
                          <a href="{{url("print")}}"> <input type="button" value="print" class="btn btn-primary mr-2"></a>
                      </div>
                  </form>
                </div>
              <div class="uploadArtwork text-center pt-5">
                <h6>Upload Artwork</h6>
                <div class="uploadLogo mt-2 p-2">
                    {{-- <input name="file" type="file"  class="dropify" data-height="100" /> --}}
                  <img src="{{asset('img/basketball.png')}}" class="img-fluid">
                  <button class="btn btn-primary">Download</button>
                </div>
              </div>
            </div>
            <!-- Place order section -->


            <!-- Product and color section -->
            <div class="col-12 col-md-6 col-lg-3 greyWhiteGradiant pl-5 pr-4 py-5">
              <div class="productOptions">
                <h3 class="productHeading pt-3 text-center">Product Options</h3>
                <form class="px-3 py-2">
                  <label for="product"><b>Product:</b></label><div></div>
                  <div class="">
                  <label for="fabricChoice" class="pt-2"><b>Fabric Choice:</b></label>
                  <select class="form-control form-control-sm" aria-label=".form-control-sm example">
                    <option >Select Fabric</option>
                    <option value="ClimaPro" selected>One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="neckStyle" class=""><b>Neck Style:</b></label>
                  <select class="form-control form-control-sm" aria-label=".form-control-sm">
                    <option >Select Fabric</option>
                    <option value="ClimaPro">One</option>
                    <option value="2"selected>Two</option>
                    <option value="3">Three</option>
                  </select>
                </div>

                <!-- <label for="fabricChoice" class="pt-2"><b>Neck Style:</b></label>
                <select class="form-control form-control-sm">
                  <option>Small select</option>
                </select> -->

                <div class="form-group">
                  <label for="jerseyFit" class=""><b>Jersey Fit/Style:</b></label>
                  <select class="form-control form-control-sm" aria-label=".form-control-sm example">
                    <option >Select Fabric</option>
                    <option value="ClimaPro">One</option>
                    <option value="2">Two</option>
                    <option value="3"selected>Three</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="shortInseam" class=""><b>Short Inseam:</b></label>
                  <select class="form-control form-control-sm" aria-label=".form-control-sm example">
                    <option selected>Select Fabric</option>
                    <option value="ClimaPro">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="notes"><b>Additional Notes:</b></label>
                  <textarea class="form-control" id="notes" rows="3" value="Adding Text"></textarea>
                </div>

                </form>
              </div>
      <div class="row">
       <div class="col pt-5">
              <div class="colorOptions">
                <h3 class="optionsHeading pt-3 text-center">Color Options</h3>
                <form class="px-3 py-2">
                  <div class="">
                  <label for="Neck" class=""><b>Neck:</b></label>
                  <select class="form-control form-control-sm" aria-label=".form-control-sm example">
                    <option >Select Fabric</option>
                    <option value="ClimaPro">One</option>
                    <option value="2" selected>Two</option>
                    <option value="3">Three</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="Accent" class=""><b>Accent:</b></label>
                  <select class="form-control form-control-sm" aria-label=".form-control-sm">
                    <option >Select Fabric</option>
                    <option value="ClimaPro">One</option>
                    <option value="2"selected>Two</option>
                    <option value="3">Three</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="buLogo" class=""><b>BU Logo:</b></label>
                  <select class="form-control form-control-sm" aria-label=".form-control-sm example">
                    <option >Select Fabric</option>
                    <option value="ClimaPro">One</option>
                    <option value="2"selected>Two</option>
                    <option value="3">Three</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="Body" class=""><b>BODY:</b></label>
                  <select class="form-control form-control-sm" aria-label=".form-control-sm example">
                    <option >Select Fabric</option>
                    <option value="ClimaPro">One</option>
                    <option value="2"selected>Two</option>
                    <option value="3">Three</option>
                  </select>
                </div>

                <div class="form-group">
                  {{-- <label for="notes"><b>Additional Notes:</b></label>
                  <textarea class="form-control" id="notes" rows="3"></textarea> --}}
                  <table>
                      <tr class="tr2">
                        <th class="th2 p-2">
Color
                        </th>
                        <th class="th2 p-2">
                            Color
                                                    </th>
                                                    <th class="th2 p-2">
                                                        Color
                                                                                </th>
                      </tr>
                      {{-- <tr class="tr2">
                          <td class="td2" style="background: red">

                        </td>
                      </tr> --}}
                  </table>


                </div>

                </form>
              </div>
            </div>
            </div>
            </div>
            <!-- Product and color section -->

            <!-- Lettering and Logos -->
            <div class="col-lg-6 col-12 greyWhiteGradiant py-5">
              <div class="lettering">
                <div class="row">
                  <div class="col-12 pt-2 pb-4">
                    <h3 class="text-center">Lettering</h3>
                  </div>
                  <div class="col-12">
                    <form action="" class="d-flex justify-content-center">
                     <div class="d-flex pr-5">
                      <button class="btn-none" id="btn_text" type="button"><i class="fas fa-plus"></i>Add New Text</button>&nbsp;

                     </div>

                     <div class="d-flex">
                      <button class="btn-none" id="btn_number" type="button"><i class="fas fa-plus"></i> Add New Number</button>&nbsp;

                     </div>
                    </form>
                  </div>
                </div>
                <div class="row px-3 py-5" id="div_append">
                  <div class="col-6 pb-3 pt-3 add-new-product1" val='1'>

                      <div class="form-group">
                        <label for="location"><b>Location:</b></label>
                        <input type="text" class="form-control form-control-sm" id="location" value="Gulberg road Liberty Chowk">
                      </div>

                    <div class="form-group">
                      <label for="text" class=""><b>Text:</b></label>
                        <input type="text" class="form-control" value="Dummy Text">
                    </div>

                    <div class="form-group">
                      <label for="mainColor" class=""><b>Main Color:</b></label>
                        <input type="text" class="form-control" value="red">
                    </div>

                    <div class="form-group">
                      <label for="trimColor" class=""><b>Trim Color:</b></label>
                        <input type="text" class="form-control" value="blue">
                    </div>

                    <div class="form-group ">
                      <label for="fontName"><b>Font Name:</b></label>
                      <input type="text" class="form-control form-control-sm" id="location" value="Ariel">
                    </div>

                    <div class="form-group">
                      <label for="size" class=""><b>Size:</b></label>
                        <input type="text" class="form-control" value="14px;">
                    </div>


                  </div>

                  <div class="col-6 pb-3 pt-3 add-new-product2" val='1'>

                      <div class="form-group">
                        <label for="location"><b>Location:</b></label>
                        <input type="text" value="location" class="form-control form-control-sm" id="location">
                      </div>



                    <div class="form-group">
                      <label for="mainColor" class=""><b>Main Color:</b></label>
                        <input type="text" class="form-control" value="ground floor">
                    </div>

                    <div class="form-group">
                      <label for="trimColor" class=""><b>Trim Color:</b></label>
                        <input type="text" class="form-control" value="abouttriming">
                    </div>

                    <div class="form-group">
                      <label for="fontName"><b>Font Name:</b></label>
                      <input type="text" class="form-control form-control-sm" id="location" value="sanserif">
                    </div>

                    <div class="form-group">
                      <label for="size" class=""><b>Size:</b></label>
                        <input type="text" class="form-control" value="20px;">
                    </div>


                  </div>


                </div>
              </div>

              <div class="logos mt-5 pt-5 bg-white">
                <div class="row px-3">
                  <div class="col-12 pt-2 pb-4">
                    <h3 class="text-center">Logos</h3>
                  </div>
                  <div class="col-12 d-flex justify-content-center">
                    <div class="card border-0">
                      {{-- <img class="img-fluid" src="./img/uploadicon.png" alt="Upload Logo"> --}}
                      {{-- <input name="file" type="file"  class="dropify" data-height="100" value="{{asset('img/shirtIcon.png')}}"/> --}}
                      <img src="{{asset('img/shirtIcon.png')}}">
                      <div class="card-body">
                        <button class="btn btn-primary">Download</button>
                      </div>
                      <div class="card-body">
                        <h5 class="card-title">Upload Logo</h5>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="row px-3">
                <div class="col-4">
                  <form>
                    <div class="form-group ">
                      <label for="product"><b>Product:</b></label>
                      <input type="text" class="form-control form-control-sm" id="location">
                    </div>

                    <div class="form-group">
                      <label for="size" class=""><b>Size:</b></label>
                      <select class="form-control form-control-sm" aria-label=".form-control-sm example">
                        <option >Select Fabric</option>
                        <option value="ClimaPro"selected>One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                      </select>
                    </div>
                  </form>
                </div>

                <div class="col-4">
                  <form>
                    <div class="form-group ">
                      <label for="product"><b>Product:</b></label>
                      <input type="text" class="form-control form-control-sm" id="location" value="product 2">
                    </div>

                    <div class="form-group">
                      <label for="size" class=""><b>Size:</b></label>
                      <select class="form-control form-control-sm" aria-label=".form-control-sm example">
                        <option >Select Fabric</option>
                        <option value="ClimaPro">One</option>
                        <option value="2"selected>Two</option>
                        <option value="3">Three</option>
                      </select>
                    </div>
                  </form>
                </div>

                <div class="col-4">
                  <form>
                    <div class="form-group ">
                      <label for="product"><b>Product:</b></label>
                      <input type="text" class="form-control form-control-sm" id="location" value="test">
                    </div>

                    <div class="form-group">
                      <label for="size" class=""><b>Size:</b></label>
                      <select class="form-control form-control-sm" aria-label=".form-control-sm example">
                        <option >Select Fabric</option>
                        <option value="ClimaPro">One</option>
                        <option value="2" selected>Two</option>
                        <option value="3">Three</option>
                      </select>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- Lettering and Logos -->

        </div>
    </div>
</section>
<script>
    $('.dropify').dropify();
</script>
<script>

$( document ).ready(function() {




$('#btn_text').click(function() {
        var val = $(".add-new-product1").attr('val');

            val++;
            $(".add-new-product1").attr('val', val);

            var html=`
            <div class="col-6 pb-3 pt-3 add-new-product1" id="removeTr" val='`+val+`'>
                        <button class="float-right btn-none" id="deletebtn"><i class="fas fa-trash" style="color: red"></i></button>
                     <div class="form-group">
                        <label for="location"><b>Location:</b></label>
                        <input type="text" class="form-control form-control-sm" id="location">
                      </div>

                    <div class="form-group">
                      <label for="text" class=""><b>Text:</b></label>
                        <input type="text" class="form-control">
                    </div>

                    <div class="form-group">
                      <label for="mainColor" class=""><b>Main Color:</b></label>
                        <input type="text" class="form-control">
                    </div>

                    <div class="form-group">
                      <label for="trimColor" class=""><b>Trim Color:</b></label>
                        <input type="text" class="form-control">
                    </div>

                    <div class="form-group ">
                      <label for="fontName"><b>Font Name:</b></label>
                      <input type="text" class="form-control form-control-sm" id="location">
                    </div>

                    <div class="form-group">
                      <label for="size" class=""><b>Size:</b></label>
                        <input type="text" class="form-control">
                    </div>
</div>

            `;
            var tableBody = $("#div_append").append(html);

                            });
        $(document).on('click', '#deletebtn', function() {
        $(this).closest('#removeTr').remove();
    });

    $('#btn_number').click(function() {
        var val = $(".add-new-product2").attr('val');

            val++;
            $(".add-new-product2").attr('val', val);

            var html=`
            <div class="col-6 pb-3 pt-3 add-new-product2" id="removeTr2" val='1'>
                    <button class="float-right btn-none" id="deletebtn2"><i class="fas fa-trash" style="color: red"></i></button>
                              <div class="form-group">
                        <label for="location"><b>Location:</b></label>
                        <input type="text" class="form-control form-control-sm" id="location">
                      </div>



                    <div class="form-group">
                      <label for="mainColor" class=""><b>Main Color:</b></label>
                        <input type="text" class="form-control">
                    </div>

                    <div class="form-group">
                      <label for="trimColor" class=""><b>Trim Color:</b></label>
                        <input type="text" class="form-control">
                    </div>

                    <div class="form-group">
                      <label for="fontName"><b>Font Name:</b></label>
                      <input type="text" class="form-control form-control-sm" id="location">
                    </div>

                    <div class="form-group">
                      <label for="size" class=""><b>Size:</b></label>
                        <input type="text" class="form-control">
                    </div>

                  </div>
            `;
            var tableBody = $("#div_append").append(html);

                            });
        $(document).on('click', '#deletebtn2', function() {
        $(this).closest('#removeTr2').remove();
    });


});
</script>
@endsection
