
    <link rel="stylesheet" type="text/css" href="{{asset('admin/admin/app-assets/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/admin/app-assets/vendors/css/forms/select/select2.min.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/admin/app-assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/admin/app-assets/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/admin/app-assets/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/admin/app-assets/css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/admin/app-assets/css/themes/dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/admin/app-assets/css/themes/semi-dark-layout.css')}}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/admin/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/admin/app-assets/css/core/colors/palette-gradient.css')}}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/admin/assets/css/style.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('admin/admin/app-assets/vendors/css/forms/select/select2.min.css')}}">
    <style>
    .form-control {
        margin-top: 8px;
        margin-bottom: 12px;
    }
    </style>


<div class="row p-3">
    <div class="col-12 mt-2">
        <label>
            <b>
                Name
            </b>
        </label>
        <br>
                <input type="hidden" name="product_id" value="{{$p_id}}">

                <input class="pro_vari" name="parent" type="hidden" value="{{$parent}}">
                <input class="pro_vari2" name="chalid" type="hidden" value="{{$chalid}}">

                    <select class="form-control colorval" name="name[]">
                        @foreach($products as $row)
                        <option value="{{$row->property}}" val2="{{$row->color}}">
                            {{$row->property}}
                        </option>
                        @endforeach
                    </select>
                    <label>
                        <b>
                            color
                        </b>
                    </label>
                    <input class="form-control" name="color" type="color" >
                    <label>
                        <b>
                            chane color name
                        </b>
                    </label>
                    <input class="form-control" name="propert" type="text" >

            
            
        </br>
    </div>
</div>



    <!-- BEGIN: Page Vendor JS-->
    <script src="{{asset('admin/admin/app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <!-- END: Page Vendor JS-->

  

    
    <script src="{{asset('admin/admin/app-assets/js/scripts/forms/select/form-select2.js')}}"></script>

     <script src="{{asset('admin/admin/app-assets/vendors/js/vendors.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{asset('admin/admin/app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{asset('admin/admin/app-assets/js/core/app-menu.js')}}"></script>
    <script src="{{asset('admin/admin/app-assets/js/core/app.js')}}"></script>
    <script src="{{asset('admin/admin/app-assets/js/scripts/components.js')}}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{asset('admin/admin/app-assets/js/scripts/forms/select/form-select2.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {

        $(".js-example-tokenizer").select2({
        tags: true,
        tokenSeparators: [',', ' ']
        })

        
        $('.colorval').change(function() {
            //Use $option (with the "$") to see that the variable is a jQuery object
            var $option = $(this).find('option:selected');
            //Added with the EDIT
            var value = $option.val();//to get content of "value" attrib
            var val2 = $option.attr('val2');//to get <option>Text</option> content
            
            alert(text);
        });

    });
</script>