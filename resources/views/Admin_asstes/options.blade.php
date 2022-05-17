@extends('Admin_asstes.layouts.main')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</script>

        <style>
            .pluscolor{
        color:rgb(0, 255, 128);
    }
    .editcolor{
        color:blueviolet
    }
        </style>
        @section('content')
        <div class="row">
            {{--
            <div class="col-lg-12">
                <button class="btn btn-success" data-target="#exampleModal" data-toggle="modal" style="float: right;" type="button">
                    Add Options
                </button>
            </div>
            --}}
        </div>
        <div class="">
            {{-- @if ($errors->has('product_id'))
            <div class="alert alert-danger">
                <span class="text-danger">
                    Product Not Found
                </span>
            </div>
            @endif --}}
            <div class="">
                {{--
                <form action="#">
                    <div class="row p-3">
                        <div class="col-lg-12 col-12 mt-2">
                            <input class="dropify" data-height="100" name="file1" type="file"/>
                        </div>
                        <div class="col-lg-10 col-12 mt-2">
                            <label>
                                <b>
                                    Header Text:
                                </b>
                            </label>
                            <br>
                                <input class="form-control mt-1" name="text" placeholder="Header Text" type="text">
                                </input>
                            </br>
                        </div>
                        <div class="col-lg-2 col-12 mt-2">
                            <label>
                                <b>
                                    Select Color :
                                </b>
                            </label>
                            <br>
                                <input class="mt-1" id="favcolor" name="color" type="color" value="#ff0000">
                                </input>
                            </br>
                        </div>
                    </div>
                </form>
                --}}
                <div class="card">
                    <div class="card-content">
                        <div class="card-header">
                            <h5 class="card-title" id="exampleModalLabel">
                                Add Option
                            </h5>
                            {{--
                            <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                <span aria-hidden="true">
                                    ×
                                </span>
                            </button>
                            --}}
                        </div>
                        <div class="card-body">
                            <form action="{{url('admin/add_option')}}" enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="row ">
                                    <div class="col-lg-12 col-12 mt-2">
                                        <label>
                                            <b>
                                                Sports Name
                                            </b>
                                        </label>
                                        <br>
                                            <select class="form-control" id="sports" name="sports">
                                                @if (isset($sports))
                                                <option value="">
                                                    Select Sports
                                                </option>
                                                @foreach ($sports as $sport)
                                                <option value="{{$sport->id}}">
                                                    {{$sport->name}}
                                                </option>
                                                @endforeach
                                        @endif
                                            </select>
                                        </br>
                                    </div>
                                    <div class="col-lg-12 col-12 mt-2">
                                        <label>
                                            <b>
                                                Product Name
                                            </b>
                                        </label>
                                        <br>
                                            <select class="form-control sports_option" id="products" name="product_id">
                                            </select>
                                        </br>
                                    </div>
                                    <div class="option" style="width: 100%;"></div>
                                   
                                </div>
                                <div class="modal-footer">
                                    {{--
                                    <button class="btn btn-secondary" data-dismiss="modal" type="button">
                                        Close
                                    </button>
                                    --}}
                                    {{-- <button class="btn btn-primary" type="submit">
                                        Add
                                    </button> --}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            
        </div>
    </link>
</link>
<script>
    $('.dropify').dropify();
</script>
<script>
    $(document).ready(function () {
            $('#sports').on('change', function () {
                // var value=$(this).val();
                var id = $(this).val();
                $.ajax({

                    type: 'get',
                    url: '{{URL::to('superadmin/get_product')}}',
                    data: {'id': id},

                    success: function (data) {

                        $('#products').empty().append(data);
                        $('.option').empty();

                    },


                });
            });
            $('.sports_option').on('change', function () {
                // var value=$(this).val();
                var id = $(this).val();
                if(id!="null")
                {
                    $.ajax({

                        type: 'get',
                        url: '{{URL::to('superadmin/get_product_option')}}',
                        data: {'id': id},

                        success: function (data) {

                            $('.option').empty().append(data);

                        },


                    });

                }
                
            });



        });
</script>
<script>
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>
@endsection
