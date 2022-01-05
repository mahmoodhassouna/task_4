<!DOCTYPE html>
<html  lang="ar" dir="rtl">
<head>
    <meta charset="utf-8" />
    <title></title>
    <meta name="description" content="Wizard examples" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link href="{{asset('assets/css/pages/wizard/wizard-3.css?v=7.0.4')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/plugins/global/plugins.bundle.css?v=7.0.4')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.css?v=7.0.4')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/style.bundle.css?v=7.0.4')}}" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="{{asset('assets/media/logos/favicon.ico')}}" />
    <style>
        label.error {
            color: red!important;
        }
        .error {
            color: #F00;

        }
    </style>
</head>
<body id="kt_body" class="header-fixed subheader-enabled page-loading" style="background: #FFFFFF">
<div class="row justify-content-center py-10 px-8 py-lg-12 px-lg-7">
    <div class="col-xl-7  col-xxl-5">
<form  class="search_farmer form" id="search" action=""  method="post">
    @csrf

    <div class="row">

        <div class="col">
            <!--begin::Input-->
            <div class="form-group">
                <label >رقم البطاقة   </label>
                <input type="text" value=""  class="form-control" name="cardNumber" id="cardNumber" placeholder=""  />

            </div>
            <!--end::Input-->
        </div>

        <div class="col">
            <!--begin::Input-->
            <div class="form-group">
                <label class="form-label">رقم القسيمة </label>
                <input type="text"  class="form-control" name="voucherNumber" id="voucherNumber" value=""  />
            </div>
            <!--end::Input-->
        </div>

    </div>

    <div class="row">

        <div class="col">
            <!--begin::Input-->
            <div class="form-group">
                <label >رقم الهوية  <span style="color: #ec0c24">*</span> </label>
                <input type="text" class="form-control" name="idNumber" id="idNumber" placeholder=""  />

            </div>
            <!--end::Input-->
        </div>

        <div class="col">
            <!--begin::Input-->
            <div class="form-group">
                <label class="form-label"> رقم القطعة  <span style="color: #ec0c24">*</span></label>
                <input type="text" class="form-control" name="pieceNumber" id="birthDate"   />
            </div>
            <!--end::Input-->
        </div>


    </div>

    <div class="row">
        <div class="col">
            <!--begin::Input-->
            <div class="form-group">
                <label>الاسم</label>
                <input type="text" class="form-control" name="fName" id="fName"   />
            </div>
            <!--end::Input-->
        </div>


    </div>

    <div class="row">

        <div class="col">
            <!--begin::Input-->
            <div class="form-group">
                <label >تاريخ الادخال </label>
                <input type="date" class="form-control" name="date" id="date"  />

            </div>
            <!--end::Input-->
        </div>

        <div class="col">
            <!--begin::Input-->
            <div class="form-group">
                <label class="form-label">  البعد عن خط التهدئة   </label>
                <input type="text" class="form-control" name="farFromArmisticeLine" id="farFromArmisticeLine"   />
            </div>
            <!--end::Input-->
        </div>


    </div>

    <div class="row">

        <div class="col">
            <label for="inputName" class="control-label">المحافظة <span style="color: #ec0c24">*</span></label>
            <select name="governorate_id" class="form-control SlectBox" >
                <option selected disabled>اختر المحافظة</option>
                @isset($governorate)
                    @foreach($governorate as $item)
                        <option value="{{$item->id}}"> {{$item->name}}</option>
                    @endforeach
                @endisset
            </select>
        </div>

        <div class="col">
            <label for="inputName" class="control-label"> المنطقة <span style="color: #ec0c24">*</span></label>
            <select name="region_id" class="form-control SlectBox" >
                <option selected disabled>اختر المنطقة</option>
            </select>
        </div>


    </div>

    <br>
   <center><button class="button_farmer btn btn-success font-weight-bold text-uppercase px-9 py-4">بحث<i id="btnn" class="fa fa-spinner fa-spin"></i> </button></center>
</form>
</div>

</div>
<h2 style="padding:0px 630px">نتائج البحث</h2>
<table class="table table-separate table-head-custom table-checkable" id="kt_datatable1">
    <thead>
    <tr>
        <td>#</td>
        <td> رقم البطاقة</td>
        <td> رقم الهوية</td>
        <td> الاسم </td>
        <td> المحافظة </td>
        <td>المنطقة </td>
        <td>الاراضي </td>

        <td>الاجراءت</td>

    </thead>
    <tbody>
    <tr>
        <td>
            --  لا يوجد نتائج بحث --
        </td></tr>

    </tbody>
</table>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



<script>var HOST_URL = "https://keenthemes.com/metronic/tools/preview";</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('assets/plugins/global/plugins.bundle.js?v=7.0.4')}}"></script>

<script src="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.4')}}"></script>
<script src="{{asset('assets/js/scripts.bundle.js?v=7.0.4')}}"></script>
<script src="{{asset('assets/js/pages/custom/wizard/wizard-3.js?v=7.0.4')}}"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

<script>

    $('#btnn').hide();
    $(document).ready(function () {

        $("#search").validate({
            rules: {
                idNumber: {
                    digits: true,
                    rangelength: [9, 9],

                },cardNumber: {
                    digits: true,
                    rangelength: [4, 14],

                },
                voucherNumber: {

                    digits: true,
                    rangelength: [4, 14],

                },pieceNumber: {

                    digits: true,
                    rangelength: [4, 14],

                },
                fName: {
                    maxlength: 50,
                },

            },
            messages: {
                idNumber: {
                    rangelength: "رقم هوية غير صالح ",
                    digits: "يرجى ادخال ارقام فقط"
                } ,
                cardNumber: {
                    digits: "الرقم  عبارة عن ارقام"
                },
                fName: {
                    maxlength: "الاسم اقل من 50 حرف"
                },

            },submitHandler: function(form) {
                $('#btnn').show();

                var formData = new FormData($('.search_farmer')[0]);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'post',
                    enctype: 'multipart/form-data',
                    url: "{{route('searchAboutFarmer')}}",
                    data: formData,
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function (data) {
                        if (data.status == 200) {
                            $('#display_error').html("");
                            $('#display_error').addClass('alert alert-danger');
                            $.each(data.errors, function (key, err_value) {
                                $('#display_error').append('<li >' + err_value + '</li>');
                            });
                        }
                        else if(data.status == 400){

                            $('tbody').html("");
                            $.each(data.data ,function (key ,item) {
                                $('tbody').append('<tr>\
                                       <td>'+item.id+'</td>\
                                       <td>'+item.cardNumber+'</td>\
                                       <td>'+item.idNumber+'</td>\
                                       <td>'+item.fName+'</td>\
                                       <td>'+item.governorate.name+'</td>\
                                       <td>'+item.region.name+'</td>\
                                       <td>'+item.cardNumber+'</td>\
                                       <td ><a class="edit_employe btn btn-outline-primary" href="{{url('/edit/farmer/')}}/'+item.id+'" >ادارة </a> </td>\
                                          </tr>');

                            });
                            $('#btnn').hide();
                            $('#kt_form').find('input').val('');
                            $('#display_error').hide();
                           // location.reload();
                        }else {
                            $('#btnn').hide();
                        }
                    }


                });

            }
            ,
        });

        $(document).on('click', '.delete_crops', function (e) {
            e.preventDefault();

            var id =  $(this).val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                url: "/delete-crops/" + id,
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    if (response.status == 200) {
                        crops();
                    } else {

                    }
                }
            });
        });

        $('select[name="governorate_id"]').on('change', function() {
            var ItemId = $(this).val();
            if (ItemId) {
                $.ajax({
                    url: "{{ URL::to('region') }}/" + ItemId,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        $('select[name="region_id"]').empty();
                        $.each(data.data, function(key, value) {
                            $('select[name="region_id"]').append('<option value="' +
                                value.id + '">' + value.name + '</option>');
                        });
                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });

    });
</script>

</body>
</html>
