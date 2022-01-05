<!DOCTYPE html>
<html  lang="ar" dir="rtl">
<head>
    <meta charset="utf-8" />
    <title></title>
    <meta name="description" content="Wizard examples" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link href="assets/css/pages/wizard/wizard-3.css?v=7.0.4" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/global/plugins.bundle.css?v=7.0.4" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/custom/prismjs/prismjs.bundle.css?v=7.0.4" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.bundle.css?v=7.0.4" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
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
<div style="padding: 0px 0px 0px -100px" id="kt_content">
    <div class="card card-custom">
        <div class="card-body p-0">
            <!--begin: Wizard-->
            <div class="wizard wizard-3" id="kt_wizard_v3" data-wizard-state="step-first" data-wizard-clickable="true">
                <!--begin: Wizard Nav-->
                <div class="wizard-nav">
                    <div class="wizard-steps px-8 py-8 px-lg-15 py-lg-3">
                        <!--begin::Wizard Step 1 Nav-->
                        <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
                            <div class="wizard-label">
                                <h3 class="wizard-title">
                                    البيانات الاساسية</h3>
                                <div class="wizard-bar"></div>
                            </div>
                        </div>
                        <!--end::Wizard Step 1 Nav-->
                        <!--begin::Wizard Step 2 Nav-->
                        <div class="wizard-step" data-wizard-type="step">
                            <div class="wizard-label">
                                <h3 class="wizard-title">
                                     الات ومعدات  </h3>
                                <div class="wizard-bar"></div>
                            </div>
                        </div>
                        <div class="wizard-step" data-wizard-type="step">
                            <div class="wizard-label">
                                <h3 class="wizard-title">
                                    القوة العاملة </h3>
                                <div class="wizard-bar"></div>
                            </div>
                        </div>
                        <!--end::Wizard Step 2 Nav-->
                        <!--begin::Wizard Step 3 Nav-->
                        <div class="wizard-step" data-wizard-type="step">
                            <div class="wizard-label">
                                <h3 class="wizard-title">
                                    الاراضي الزراعية </h3>
                                <div class="wizard-bar"></div>
                            </div>
                        </div>

                        <div class="wizard-step" data-wizard-type="step">
                            <div class="wizard-label">
                                <h3 class="wizard-title">
                                    التطبيقات</h3>
                                <div class="wizard-bar"></div>
                            </div>
                        </div>




                    </div>
                </div>
                <!--end: Wizard Nav-->
                <!--begin: Wizard Body-->
                <ul id="display_error"></ul>
                <div class="row justify-content-center py-10 px-8 py-lg-12 px-lg-7">
                    <div class="col-xl-7  col-xxl-5">

                        <div class="pb-5" data-wizard-type="step-content" >
                            <form  class="add_farmer form" id="kt_form" action=""  method="post">
                                @csrf

                                <div class="row">

                                    <div class="col">
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label >رقم البطاقة  <span style="color: #ec0c24">*</span> </label>
                                            <input type="text" value="{{random_int(1, 2000)}}" readonly class="form-control" name="cardNumber" id="cardNumber" placeholder=""  />

                                        </div>
                                        <!--end::Input-->
                                    </div>

                                    <div class="col">
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label class="form-label">تاريخ الادخال  <span style="color: #ec0c24">*</span></label>
                                            <input type="text" readonly class="form-control" name="entryDate" id="entryDate" value="{{date('d-m-Y')}}"  />
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
                                            <label class="form-label"> تاريخ الميلاد  <span style="color: #ec0c24">*</span></label>
                                            <input type="date" class="form-control" name="birthDate" id="birthDate"   />
                                        </div>
                                        <!--end::Input-->
                                    </div>


                                </div>
                                <div class="row">
                                    <div class="col-xl-3">
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label>الاسم</label>
                                            <input type="text" class="form-control" name="fName" id="fName"   />
                                        </div>
                                        <!--end::Input-->
                                    </div>
                                    <div class="col-xl-3">
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label> اسم الاب  <span style="color: #ec0c24">*</span></label>
                                            <input type="text" class="form-control" name="mName" id="mName"   />
                                        </div>
                                        <!--end::Input-->
                                    </div>
                                    <div class="col-xl-3">
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label>اسم الجد</label>
                                            <input type="text" class="form-control" name="gName" id="gName"    />
                                        </div>
                                        <!--end::Input-->
                                    </div>
                                    <div class="col-xl-3">
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label> العائلة  <span style="color: #ec0c24">*</span></label>
                                            <input type="text" class="form-control" name="lName" id="lName"   />
                                        </div>
                                        <!--end::Input-->
                                    </div>


                                </div>

                                <div class="row">

                                    <div class="col">
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label >الجوال </label>
                                            <input type="text" class="form-control" name="phone" id="phone"  />

                                        </div>
                                        <!--end::Input-->
                                    </div>

                                    <div class="col">
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label class="form-label">  البريد الالكتروني  </label>
                                            <input type="email" class="form-control" name="email" id="email"   />
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

                                <div class="row">
                                    <div class="col">
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label>اقرب معلم </label>
                                            <input type="text" class="form-control" name="guide" id="guide"    />
                                        </div>
                                        <!--end::Input-->
                                    </div>



                                </div>

                                <div class="row">

                                    <div class="col">
                                        <label for="inputName" class="control-label">الحالة الاجتماعية</label>
                                        <select name="socialState" class="form-control SlectBox" >
                                                    <option value="اعزب"> اعزب</option>
                                                    <option value="متزوج"> متزوج</option>
                                        </select>
                                    </div>

                                    <div class="col">
                                        <label for="inputName" class="control-label">الجنس</label>
                                        <select name="gender" class="form-control SlectBox" >

                                            <option value="ذكر"> ذكر</option>
                                            <option value="انثى"> انثى</option>
                                        </select>
                                    </div>


                                </div>

                                <div class="row">

                                    <div class="col">
                                        <label for="inputName" class="control-label">المؤهل العلمي</label>
                                        <select name="qualifications" class="form-control SlectBox" >

                                            <option value="ثانوية"> ثانوية عامة</option>
                                            <option value="دبلوم"> دبلوم</option>
                                            <option value="بكالوريس"> بكالوريس</option>
                                            <option value="غير ذلك"> غير ذلك</option>

                                        </select>
                                    </div>




                                </div>
                            <br>
                                <button class="button_farmer btn btn-success font-weight-bold text-uppercase px-9 py-4">حفظ</button>
                            </form>
                        </div>
                        <div class="pb-5" data-wizard-type="step-content">
                            <button onclick="showRowForm()" class="addEquipments btn btn-success  px-6 py-2">اضافة</button>

                            <div class="card-body">
                                <!--begin: Datatable-->
                                <table class="table  table-checkable" id="kt_datatable1">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>نوع الالة </th>
                                        <th> نوع الملكية</th>
                                        <th> العدد</th>
                                        <th> ملاحظات </th>
                                        <th>الاجراءت</th>
                                    </tr>
                                    </thead>
                                    <tbody id="equipment_datatable">
                                    <tr>
                                        <td>

                                        </td>
                                    </tr>
                                    </tbody>
                                    <tfoot id="test">
                                    <form method="post" class="equipment" id="equipment">
                                        <input type="hidden" value="" name="farmer_id" id="farmer_id">
                                    <tr>
                                        <td>

                                        </td>
                                        <td>
                                            <select name="machine" class="form-control SlectBox" >
                                                <option value="تركتور"> تركتور</option>
                                                <option value="جرار زراعي"> جرار زراعي</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select name="propertyType" class="form-control SlectBox" >
                                                <option value="ملك"> ملك</option>
                                                <option value="ايجار">  ايجار</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="number" id="number"   />
                                        </td>
                                        <td>
                                            <input max="10" type="text" class="form-control" name="notes" id="notes"   />
                                        </td>
                                        <td>
                                            <button class="button_add_user btn btn-secondary  px-6 py-2">حفظ </button>

                                        </td>
                                    </tr>
                                      </form>
                                    </tfoot>
                                </table>
                                <!--end: Datatable-->
                            </div>


                        </div>
                        <div class="pb-5" data-wizard-type="step-content">

                            <form id="add_tworkers" class="add_tworkers" action="" method="post" >
                                @csrf
                                <input type="hidden" value="" id="farmer_id" name="farmer_id">

                                <div class="row">
                                    <div class="col-xl-6">
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label>  عدد الذكور   <span style="color: #ec0c24">*</span></label>
                                            <input type="text" class="form-control" name="numberMales"  />
                                        </div>

                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label>عدد الذكور من الاسرة   <span style="color: #ec0c24">*</span></label>
                                            <input type="text" class="form-control" name="numberMalesFamily"  />
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-xl-6">
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label>     عدد الاناث   <span style="color: #ec0c24">*</span></label>
                                            <input type="text" class="form-control" name="numberFmales"  />
                                        </div>

                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label>  عدد الاناث من الاسرة</label>
                                            <input type="text" class="form-control" name="numberFmalesFamily"  />
                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-success font-weight-bold text-uppercase px-6 py-2">اضافة</button>
                            </form>

                            <div class="card-body">
                                <!--begin: Datatable-->
                                <table class="table table-separate table-head-custom table-checkable" id="kt_datatable1">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>رقم الهوية </th>
                                        <th>الاسم رباعي</th>
                                        <th>الجنس</th>
                                        <th>الجوال </th>
                                        <th>العنوان</th>
                                        <th>من الاسرة</th>
                                        <th>الاجراءت</th>
                                    </tr>
                                    </thead>
                                    <tbody id="pworkers">

                                    </tbody>
                                    <tfoot id="test2">
                                    <tr>

                                        <button onclick="showRowForm2()" class=" btn btn-success  px-6 py-2">اضافة</button>

                                        <form id="add_pworkers" class="add_pworkers" action="" method="post" >
                                            @csrf
                                            <input type="hidden" value="" id="farmer_id" name="farmer_id">
                                        <td>

                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="idNumber" id="idNumber"    />
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="name" id="name"   />
                                        </td>
                                        <td>
                                            <select name="gender" class="form-control SlectBox" >

                                                        <option value="ذكر"> ذكر</option>
                                                        <option value="انثى"> انثى</option>

                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="phone" id="phone"    />
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="address" id="address"    />
                                        </td>
                                        <td>
                                            <div class="checkbox-single">
                                                <label class="checkbox">
                                                    <input name="familyMembers" value="true" type="checkbox" checked="checked" />نعم
                                                    <span></span></label>
                                            </div>

                                        </td>
                                        <td>
                                            <button class="add_permanentworker btn btn-secondary  px-6 py-2">حفظ</button>

                                        </td>
                                        </form>
                                    </tr>
                                    </tfoot>
                                </table>
                                <!--end: Datatable-->
                            </div>
                        </div>
                        <div class="pb-5" data-wizard-type="step-content">

                            <div class="card-body">


                                <a class="btn btn-success add_ap" href="{{route('land')}}">اضافة ارض زراعية</a>
                                    <!--begin: Datatable-->
                                    <input type="hidden" value="1" name="farmer_id" id="farmer_id">
                                    <table class="table table-separate table table-checkable" id="kt_datatable1">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>  رقم القطعة </th>
                                            <th>   رقم القسيمة</th>
                                            <th>    نوع التعاقد</th>
                                            <th>     اسم المالك</th>
                                            <th>      المساحة</th>
                                            <th>      الاجراءت</th>
                                        </tr>
                                        </thead>
                                        <tbody id="lands_farmer" >

                                          <tr>
                                              <td></td>
                                              <td></td>
                                              <td></td>
                                              <td>لا يوجد بيانات بعد</td>
                                              <td></td>
                                              <td></td>
                                              <td></td>
                                          </tr>
                                        </tbody>

                                    </table>
                                </form>
                                <!--end: Datatable-->
                            </div>
                        </div>
                        <div class="pb-5" data-wizard-type="step-content">
                            <div class="card-body">
                                <form method="post" class="application" id="application">
                                    <button class="btn btn-success add_application">اضافة</button>
                                <!--begin: Datatable-->
                                    <input type="hidden" value="" name="farmer_id" id="farmer_id">
                                    <table class="table table-separate table-head-custom table-checkable" id="kt_datatable1">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>  التطبيق </th>
                                        <th>   القيمة</th>
                                    </tr>
                                    </thead>
                                    <tbody >

                                    <tr>
                                        <td>1</td>
                                        <td>هل تستخدم اصول محسنة(درنات - اشتال - ابصال - بذور)</td>
                                        <td>
                                            <select name="q1" class="form-control SlectBox" >

                                                <option value="نعم">نعم</option>
                                                <option value="لا">لا</option>

                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>هل تستخدم اسمدة عضوية</td>
                                        <td>
                                            <select name="q2" class="form-control SlectBox" >

                                                <option value="نعم">نعم</option>
                                                <option value="لا">لا</option>

                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>هل تستخدم اسمدة كيماوية</td>
                                        <td>
                                            <select name="q3" class="form-control SlectBox" >

                                                <option value="نعم">نعم</option>
                                                <option value="لا">لا</option>

                                            </select>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>4</td>
                                        <td>هل تستخدم مبيدات زراعية</td>
                                        <td>
                                            <select name="q4" class="form-control SlectBox" >

                                                <option value="نعم">نعم</option>
                                                <option value="لا">لا</option>

                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>هل تستخدم المكافحة المتكاملة</td>
                                        <td>
                                            <select name="q5" class="form-control SlectBox" >

                                                <option value="نعم">نعم</option>
                                                <option value="لا">لا</option>

                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>هل تقوم بتطعيم حيواناتك ضد الامراض الوراثية</td>
                                        <td>
                                            <select name="q6" class="form-control SlectBox" >

                                                <option value="نعم">نعم</option>
                                                <option value="لا">لا</option>

                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>هل يوجد فقاسة؟</td>
                                        <td>
                                            <select name="q7" class="form-control SlectBox" id="select20">
                                                <option value="نعم">نعم</option>
                                                <option selected="selected" value="لا">لا</option>

                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td>هل تتلقى خدمات حكومية</td>
                                        <td>
                                            <select name="q7" class="form-control SlectBox" >

                                                <option value="نعم">نعم</option>
                                                <option value="لا">لا</option>

                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>9</td>
                                        <td>هل يشكل دخل الحيازة 50%ٌ او اكثر من دخل الاسرة</td>
                                        <td>
                                            <select name="q8" class="form-control SlectBox" >

                                                <option value="نعم">نعم</option>
                                                <option value="لا">لا</option>

                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>10</td>
                                        <td>هل استفدت من مشاريع شق الطرق الزراعية واستصلاحات الاراضي</td>
                                        <td>
                                            <select name="q9" class="form-control SlectBox" >

                                                <option value="نعم">نعم</option>
                                                <option value="لا">لا</option>

                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>11</td>
                                        <td>هل تصنع منتجات الحيازة</td>
                                        <td>
                                            <select name="q10" class="form-control SlectBox" >

                                                <option value="نعم">نعم</option>
                                                <option value="لا">لا</option>

                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>12</td>
                                        <td>هل يوجد لديك بئر مياه</td>
                                        <td>
                                            <select name="q11" class="form-control SlectBox" >

                                                <option value="نعم">نعم</option>
                                                <option value="لا">لا</option>

                                            </select>
                                        </td>
                                    </tr>
                                    <tr id="r20" style="display: none">
                                        <td>13</td>
                                        <td>الطاقة الانتاجية (بيضة\دورة)</td>
                                        <td>
                                            <input type="text" value=""  class="form-control " name="productionCapacity" id="productionCapacity" placeholder=""  />

                                        </td>
                                    </tr>


                                    </tbody>

                                </table>
                                </form>
                                <!--end: Datatable-->
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!--end: Wizard-->
    </div>
</div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



<script>var HOST_URL = "https://keenthemes.com/metronic/tools/preview";</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="assets/plugins/global/plugins.bundle.js?v=7.0.4"></script>

<script src="assets/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.4"></script>
<script src="assets/js/scripts.bundle.js?v=7.0.4"></script>
<script src="assets/js/pages/custom/wizard/wizard-3.js?v=7.0.4"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

<script>
    $('#test').hide();
    $('#test2').hide();
    function showRowForm(){
        $('#test').toggle();
    }
    function showRowForm2(){
        $('#test2').toggle();
    }



    $(document).ready(function () {


        latestFarmer();
        Equipments();
        lands();
        pworkers();

        function pworkers(){
            $.ajax({
                type:"GET",
                url:"{{route('pworkers')}}",
                dataType:"json",
                success: function (response) {
                    //console.log(response.data)
                    $('#pworkers').html("");
                    $.each(response.pworkers ,function (key ,item) {
                        $('#pworkers').append('<tr>\
                                       <td>'+item.id+'</td>\
                                       <td>'+item.idNumber+'</td>\
                                       <td>'+item.name+'</td>\
                                       <td>'+item.gender+'</td>\
                                       <td>'+item.phone+'</td>\
                                       <td>'+item.address+'</td>\
                                       <td>'+(item.familyMembers == 0 ? 'لا':'نعم' )+'</td>\
                                       <td ><button  type="button" value="'+item.id+'" class=" btn-outline-danger delete_pworkers">Delete</button>  </td>\
                                          </tr>');
                    });
                }
            });
        }

        function Equipments(){
            $.ajax({
                type:"GET",
                url:"{{route('equipments')}}",
                dataType:"json",
                success: function (response) {
                    //console.log(response.data)
                    $('#equipment_datatable').html("");
                    $.each(response.equipments ,function (key ,item) {
                        $('#equipment_datatable').append('<tr>\
                                       <td>'+item.id+'</td>\
                                       <td>'+item.machine+'</td>\
                                       <td>'+item.propertyType+'</td>\
                                       <td>'+item.number+'</td>\
                                       <td>'+item.notes+'</td>\
                                       <td ><button  type="button" value="'+item.id+'" class=" btn-outline-danger delete_equipment">Delete</button>  </td>\
                                          </tr>');
                    });
                }
            });
        }

        function latestFarmer(){

            $.ajax({
                type:"GET",
                url:"{{route('latestFarmer')}}",
                dataType:"json",
                success: function (response) {
                    //  console.log(response.farmer.id);
                    $('input[name="farmer_id"]').val(response.farmer.id);

                }
            });
        }

        function lands(){

            $.ajax({
                type:"GET",
                url:"{{route('lands-farmer')}}",
                dataType:"json",
                success: function (response) {
                    $('#lands_farmer').html("");
                    $.each(response.land ,function (key ,item) {
                        $('#lands_farmer').append('<tr>\
                                       <td>'+item.id+'</td>\
                                       <td>'+item.pieceNumber+'</td>\
                                       <td>'+item.voucherNumber+'</td>\
                                       <td>'+item.typeOfContract+'</td>\
                                       <td>'+item.owner+'</td>\
                                       <td>'+item.totalLandArea+'</td>\
                                       <td ><a class="btn-outline-primary" href="{{url('/showLand/')}}/'+item.id+'" >عرض </a> <button  type="button" value="'+item.id+'" class=" btn-outline-danger delete_land">Delete</button>  </td>\
                                          </tr>');
                    });
                }
            });
        }

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
        $("#kt_form").validate({
            rules: {
                idNumber: {
                    required: true,
                    digits: true,
                    rangelength: [9, 9],

                },
                cardNumber: {
                    required: true,
                    digits: true,

                },
                fName: {
                    required: true,
                    maxlength: 50,
                },mName: {
                    required: true,
                    maxlength: 50,
                },gName: {
                    required: false,
                    maxlength: 50,
                },lName: {
                    required: true,
                    maxlength: 50,
                },
                birthDate: {
                    required: true,

                },entryDate: {
                    required: true,

                },

                gender: {
                    required: false,
                    required: true,
                },
                phone: {
                    required: false,
                    digits: true,
                    rangelength: [7, 10],

                },
                guide: {
                    required: false,
                    maxlength: 70
                },
                email: {
                    required: false,
                    email: true
                },

            },
            messages: {
                idNumber: {
                    rangelength: "رقم هوية غير صالح ",
                    required: "رقم الهوية مطلوب",
                    digits: "يرجى ادخال ارقام فقط"
                } ,
                cardNumber: {
                    required: "يرجى ادخال رقم البطاقة ",
                    digits: "الرقم الوظيفي عبارة عن ارقام"
                },
                fName: {
                    required: "يرجى ادخال الاسم",
                    maxlength: "الاسم اقل من 50 حرف"
                },mName: {
                    required: "يرجى ادخال الاسم",
                    maxlength: "الاسم اقل من 50 حرف"
                },gName: {
                    maxlength: "الاسم اقل من 50 حرف"
                },lName: {
                    required: "يرجى ادخال الاسم",
                    maxlength: "الاسم اقل من 50 حرف"
                },
                birthDate: {
                    required: "يرجى ادخال تاريخ الميلاد",
                },entryDate: {
                    required: "يرجى ادخال تاريخ الادخال",
                },

                gender: {
                    required: "يرجى اختيار الجنس",
                },
                phone: {
                    digits: "يجب ادخال رقم جوال صالح",
                    rangelength: "يرجى التاكد من صيغة رقم الجوال",
                },
                guide: {

                    maxlength: "ادخل اقرب معلم في 70 حرف "

                },
                email: {
                    email: "صيغة الايميل غير صحيحة",
                },

            },submitHandler: function(form) {


                var formData = new FormData($('.add_farmer')[0]);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'post',
                    enctype: 'multipart/form-data',
                    url: "{{route('createFarmer')}}",
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
                            latestFarmer();
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: data.msg,
                                showConfirmButton: false,
                                timer: 1500
                            })
                            $('#kt_form').find('input').val('');
                            $('#display_error').hide();
                            location.reload();
                        }else {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'error',
                                title: data.msg,
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }
                    }


                });

            }
            ,
            // errorPlacement: function(error, element) {
            //     element.css('background', '#ffdddd');
            //     error.insertAfter(element);
            // }
        });

        $("#equipment").validate({
            rules: {
                number: {
                    digits: true,
                    maxlength: 9,
                    required: true,

                },
                notes: {
                    required: false,
                    maxlength: 150,
                }

            },
            messages: {

                number: {
                    maxlength: "العدد اقل من  9ارقام",
                    digits: "ادخل ارقام فقط",
                },
                notes: {
                    maxlength: "الملاحظات تختصر في 150 حرف فقط "
                }
            },submitHandler: function(form) {


                var formData = new FormData($('.equipment')[0]);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'post',
                    url: "{{route('createEquipment')}}",
                    data: formData,
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function (data) {
                        if (data.status == 400) {
                            $('#display_error').html("");
                            $('#display_error').addClass('alert alert-danger');
                            $.each(data.errors, function (key, err_value) {
                                $('#display_error').append('<li >' + err_value + '</li>');
                            });
                        }
                        else if(data.status == 200){
                            Equipments();
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: data.msg,
                                showConfirmButton: false,
                                timer: 1500
                            })
                            $('#kt_form').find('input').val('');
                            $('#display_error').hide();
                        } else if(data.status == 402) {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'error',
                                title: data.msg,
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }else {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'error',
                                title: data.msg,
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }
                    }


                });

            }
            ,
            // errorPlacement: function(error, element) {
            //     element.css('background', '#ffdddd');
            //     error.insertAfter(element);
            // }
        });

        $("#add_tworkers").validate({
            rules: {
                numberMales: {
                    digits: true,
                    maxlength: 5,
                    required: true,

                }, numberMalesFamily: {
                    digits: true,
                    maxlength: 5,
                    required: true,

                }, numberFmales: {
                    digits: true,
                    maxlength: 5,
                    required: true,

                }, numberFmalesFamily: {
                    digits: true,
                    maxlength: 5,
                    required: true,

                },

            },
            messages: {

                numberMales: {
                    maxlength: "العدد اقل من  5ارقام",
                    digits: "ادخل ارقام فقط",
                    required:"العدد مطلوب"
                }, numberMalesFamily: {
                    maxlength: "العدد اقل من  5ارقام",
                    digits: "ادخل ارقام فقط",
                    required:"العدد مطلوب"
                }, numberFmales: {
                    maxlength: "العدد اقل من  5ارقام",
                    digits: "ادخل ارقام فقط",
                    required:"العدد مطلوب"
                }, numberFmalesFamily: {
                    maxlength: "العدد اقل من  5ارقام",
                    digits: "ادخل ارقام فقط",
                    required:"العدد مطلوب"
                },
            },submitHandler: function(form) {


                var formData = new FormData($('.add_tworkers')[0]);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'post',
                    url: "{{route('createtemp_worker')}}",
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
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: data.msg,
                                showConfirmButton: false,
                                timer: 1500
                            })
                            $('#add_tworkers').find('input').val('');
                            $('#display_error').hide();
                        }else {

                        }
                    }


                });

            }
            ,
            // errorPlacement: function(error, element) {
            //     element.css('background', '#ffdddd');
            //     error.insertAfter(element);
            // }
        });

        $("#add_pworkers").validate({
            rules: {
                idNumber: {
                    digits: true,
                    maxlength: 9,
                    required: true,

                }, phone: {
                    digits: true,
                    maxlength: 10,
                    required: true,

                }, name: {
                    maxlength: 20,
                    required: true,

                }, address: {
                    maxlength: 20,
                    required: true,

                },

            },
            messages: {

                idNumber: {
                    maxlength: "العدد اقل من  9ارقام",
                    digits: "ادخل ارقام فقط",
                    required:"يجب ادخال رقم الهوية"
                }, phone: {
                    maxlength: "العدد اقل من  10ارقام",
                    digits: "ادخل ارقام فقط",
                    required:"يجب ادخال رقم الهاتف"
                }, name: {
                    required: "يجب ادخال الاسم",
                    maxlength: "النص طويل جدا",
                }, address: {
                    maxlength: "النص طويل جدا",
                    required:"يجب ادخال العنوان"
                },
            },submitHandler: function(form) {


                var formData = new FormData($('.add_pworkers')[0]);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'post',
                    url: "{{route('createper_worker')}}",
                    data: formData,
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function (data) {
                        if (data.status == 400) {
                            $('#display_error').html("");
                            $('#display_error').addClass('alert alert-danger');
                            $.each(data.errors, function (key, err_value) {
                                $('#display_error').append('<li >' + err_value + '</li>');
                            });
                        }
                        else if(data.status == 200){
                            pworkers();
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: data.msg,
                                showConfirmButton: false,
                                timer: 1500
                            })
                            $('#kt_form').find('input').val('');
                            $('#display_error').hide();
                        }else {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'error',
                                title: data.msg,
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }
                    }


                });

            }
            ,
            // errorPlacement: function(error, element) {
            //     element.css('background', '#ffdddd');
            //     error.insertAfter(element);
            // }
        });

        $("#application").validate({
            rules: {

                productionCapacity:{
                    required: false,
                    digits: true,
                    maxlength: 4
                }

            },
            messages: {

                productionCapacity: {
                    maxlength: "العدد اقل من  4 خانات",
                    digits: "ادخل ارقام فقط",
                },
            },submitHandler: function(form) {


                var formData = new FormData($('.application')[0]);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'post',
                    url: "{{route('create_application')}}",
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
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: data.msg,
                                showConfirmButton: false,
                                timer: 1500
                            })
                            $('#kt_form').find('input').val('');
                            $('#display_error').hide();
                        }else {

                        }
                    }


                });

            }
            ,
            // errorPlacement: function(error, element) {
            //     element.css('background', '#ffdddd');
            //     error.insertAfter(element);
            // }
        });

        $(document).on('click', '.delete_equipment', function (e) {
            e.preventDefault();

            var id =  $(this).val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                url: "/delete-equipment/" + id,
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    if (response.status == 200) {
                        Equipments();
                    } else {

                    }
                }
            });
        });

        $(document).on('click', '.delete_pworkers', function (e) {
            e.preventDefault();

            var id =  $(this).val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                url: "/delete-pworkers/" + id,
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    if (response.status == 200) {
                        pworkers();
                    } else {

                    }
                }
            });
        });

        $('#select20').change(function(){

            var value = $(this).val();
            var r20 = document.getElementById('r20');


            if(value == 'نعم' ){
                r20.style.display="";
            }
            if(value == 'لا' ){
                r20.style.display="none";
            }
        })

        $(document).on('click', '.delete_land', function (e) {
            e.preventDefault();

            var id =  $(this).val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                url: "/delete-land/" + id,
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    if (response.status == 200) {
                        lands();
                    } else {

                    }
                }
            });
        });

    });
</script>

</body>
</html>
