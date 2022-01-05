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

</head>
<body id="kt_body" class="header-fixed subheader-enabled page-loading" style="background: #FFFFFF">
<br><br>
<h2 style="padding: 34px 560px">جدول عرض حركات النظام</h2>
<div class="pb-5" data-wizard-type="step-content">

    <div class="card-body">


        <table class="table table-separate table table-checkable" id="kt_datatable1">
            <thead>
            <tr>
                <th>#</th>
                <th>المحتوى</th>
                <th>المستخدم </th>
                <th>العملية</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            </thead>
            <tbody id="notify" >


            </tbody>

        </table>
        </form>
    </div>
</div>

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
    $(document).ready(function () {

        notify();
        function notify(){
            $.ajax({
                type:"GET",
                url:"{{route('NotifySystem')}}",
                dataType:"json",
                success: function (response) {
                    //console.log(response.data)
                    $('#notify').html("");
                    $.each(response.notify ,function (key ,item) {
                        $('#notify').append('<tr>\
                                       <td>'+item.id+'</td>\
                                       <td>'+item.content+'</td>\
                                       <td>'+item.user+'</td>\
                                       <td>'+item.operation+'</td>\
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
