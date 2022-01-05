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
<br><br>
<div class="row">
    <div class="col-1">
        <a class="btn btn-info" href="{{url('/farmer')}}" >اضافة مزارع </a>

    </div>
    <div class="col-2">
        <a class="btn btn-info" href="{{url('/search-farmer')}}" >بحث عن مزارع </a>

    </div> <div class="col-2" >
        <a class="btn btn-info" href="{{url('/archiveFarmers')}}" >عرض المزارعين المؤرشفين </a>

    </div>
    <div class="col-2" >
        <a class="btn btn-info" href="{{url('/NotifySystemTable')}}" >سجل حركات النظام </a>

    </div>


</div>
<h2 style="padding: 34px 560px">جدول عرض بيانات المزارعين</h2>
<div class="pb-5" data-wizard-type="step-content">

    <div class="card-body">


        <table class="table table-separate table table-checkable" id="kt_datatable1">
            <thead>
            <tr>
                <th>#</th>
                <th>  رقم البطاقة </th>
                <th>   رقم الهوية</th>
                <th>    تاريخ الدخول</th>
                <th>     الاسم </th>
                <th>      رقم الجوال</th>
                <th>      الايميل</th>
                <th>      الجنس</th>
                <th>      اقرب معلم</th>
                <th>      المؤهل</th>
                <th>      الحالة الاجتماعية</th>
                <th>      الاجراءت</th>
            </tr>
            </thead>
            <tbody id="farmers" >


            </tbody>

        </table>
        </form>
    </div>
</div>

</div>
{{-- Delete Modal --}}
<div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <h4>هل بالتاكيد تريد حذف بطاقة المزارع ؟</h4>
                <input type="hidden" id="deleteing_id">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger delete_farmer">نعم متأكد</button>
            </div>
        </div>
    </div>
</div>
{{-- End - Delete Modal --}}

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
    $(document).ready(function () {

        farmers();
    function farmers(){
        $.ajax({
            type:"GET",
            url:"{{route('farmers')}}",
            dataType:"json",
            success: function (response) {
                //console.log(response.data)
                $('#farmers').html("");
                $.each(response.farmers ,function (key ,item) {
                    $('#farmers').append('<tr>\
                                       <td>'+item.id+'</td>\
                                       <td>'+item.cardNumber+'</td>\
                                       <td>'+item.idNumber+'</td>\
                                       <td>'+item.entryDate+'</td>\
                                       <td>'+item.fName+'</td>\
                                       <td>'+item.phone+'</td>\
                                       <td>'+item.email+'</td>\
                                       <td>'+item.gender+'</td>\
                                       <td>'+item.guide+'</td>\
                                       <td>'+item.qualifications+'</td>\
                                       <td>'+item.socialState+'</td>\
                                       <td ><button  type="button" value="'+item.id+'" class="btn btn-warning arch_farmer">ارشفة</button> <button type="button" value="'+item.id+'" class="deletebtn btn btn-danger">حذف</button> <a class="btn btn-info" href="{{url('/edit/farmer/')}}/'+item.id+'" >ادارة </a> </td>\
                                          </tr>');
                });
            }
        });
    }

        $(document).on('click', '.arch_farmer', function (e) {
            e.preventDefault();
            var id =  $(this).val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                url: "/arch-farmer/" + id,
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    if (response.status == 200) {
                        farmers();
                    } else {
                    }
                }
            });
        });

        $(document).on('click', '.deletebtn', function () {
            var id = $(this).val();
            $('#DeleteModal').modal('show');
            $('#deleteing_id').val(id);
        });

        $(document).on('click', '.delete_farmer', function (e) {
            e.preventDefault();
            var id = $('#deleteing_id').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                url: "/delete-farmer/" + id,
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    if (response.status == 200) {
                        farmers();
                        $('#DeleteModal').modal('hide');
                    } else {
                        $('#DeleteModal').modal('hide');
                    }
                }
            });
        });




    });
</script>

</body>
</html>
