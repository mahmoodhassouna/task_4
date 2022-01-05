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
                                    الشركاء \ المباني \ مصادر الري  </h3>
                                <div class="wizard-bar"></div>
                            </div>
                        </div>
                        <div class="wizard-step" data-wizard-type="step">
                            <div class="wizard-label">
                                <h3 class="wizard-title">
                                    المحاصيل \ الخضراوات \ الاشجار </h3>
                                <div class="wizard-bar"></div>
                            </div>
                        </div>
                        <!--end::Wizard Step 2 Nav-->
                        <!--begin::Wizard Step 3 Nav-->
                        <div class="wizard-step" data-wizard-type="step">
                            <div class="wizard-label">
                                <h3 class="wizard-title">
                                    الماشية \ الدواجن </h3>
                                <div class="wizard-bar"></div>
                            </div>
                        </div>

                        <div class="wizard-step" data-wizard-type="step">
                            <div class="wizard-label">
                                <h3 class="wizard-title">
                                    اخرى</h3>
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
                        <!--begin: Wizard Form-->


                        <div class="pb-5" data-wizard-type="step-content" >
                            <form  class="add_land form" id="kt_form" action=""  method="post">
                                @csrf
                                <input type="hidden" value="{{$farmer_id}}" name="farmer_id" id="farmer_id">

                                <div class="row">

                                    <div class="col">
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label >رقم القطعة  <span style="color: #ec0c24">*</span> </label>
                                            <input type="text" class="form-control" name="pieceNumber" id="pieceNumber"  />

                                        </div>
                                        <!--end::Input-->
                                    </div>

                                    <div class="col">
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label class="form-label"> رقم القسيمة  <span style="color: #ec0c24">*</span></label>
                                            <input type="text" class="form-control" name="voucherNumber" id="voucherNumber" placeholder=""  />
                                        </div>
                                        <!--end::Input-->
                                    </div>


                                </div>

                                <div class="row">

                                    <div class="col">
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label >مساحة المباني لاغراض الحيازة   <span style="color: #ec0c24">*</span> </label>
                                            <input type="text" oninput="myFunction()" class="form-control" value="0" name="areaBuildingTenurePurposes" id="areaBuildingTenurePurposes" placeholder=""  />

                                        </div>
                                        <!--end::Input-->
                                    </div>

                                    <div class="col">
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label class="form-label"> مساحة المباني لغير اغراض الحيازة   <span style="color: #ec0c24">*</span></label>
                                            <input type="text" oninput="myFunction()" class="form-control" value="0" name="areaBuildingNonTenurePurposes" id="areaBuildingNonTenurePurposes" placeholder=""  />
                                        </div>
                                        <!--end::Input-->
                                    </div>


                                </div>

                                <div class="row">

                                    <div class="col">
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label >مساحة البور الدائم   <span style="color: #ec0c24">*</span> </label>
                                            <input type="text" oninput="myFunction()" value="0" class="form-control" name="permanentFallowArea" id="permanentFallowArea" placeholder=""  />

                                        </div>
                                        <!--end::Input-->
                                    </div>

                                    <div class="col">
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label class="form-label"> مساحة البور المؤقت   <span style="color: #ec0c24">*</span></label>
                                            <input type="text" value="0" oninput="myFunction()" class="form-control" name="temporaryFallowSpace" id="temporaryFallowSpace" placeholder=""  />
                                        </div>
                                        <!--end::Input-->
                                    </div>


                                </div>

                                <div class="row">

                                    <div class="col">
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label >مساحة الارض المزروعة   <span style="color: #ec0c24">*</span> </label>
                                            <input type="text" value="0" oninput="myFunction()" class="form-control" name="cultivatedLandArea" id="cultivatedLandArea" placeholder=""  />

                                        </div>
                                        <!--end::Input-->
                                    </div>

                                    <div class="col">
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label class="form-label"> مساحة الاشجار الحرجية   <span style="color: #ec0c24">*</span></label>
                                            <input type="text" oninput="myFunction()" value="0"  class="form-control" name="areaForestTrees" id="areaForestTrees" placeholder=""  />
                                        </div>
                                        <!--end::Input-->
                                    </div>


                                </div>

                                <div class="row">

                                    <div class="col">
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label >مساحة الارض الاجمالية   <span style="color: #ec0c24">*</span> </label>
                                            <input type="text"  readonly value="0" class="form-control" name="totalLandArea" id="totalLandArea" placeholder=""  />

                                        </div>
                                        <!--end::Input-->
                                    </div>

                                    <div class="col">
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label class="form-label"> البعد عن خط الهدنة   <span style="color: #ec0c24">*</span></label>
                                            <input type="text" class="form-control" name="farFromArmisticeLine" id="farFromArmisticeLine" placeholder=""  />
                                        </div>
                                        <!--end::Input-->
                                    </div>


                                </div>
                                <div class="row">

                                    <div class="col">
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label >خطوط العرض   <span style="color: #ec0c24">*</span> </label>
                                            <input type="text"   value="0" class="form-control" name="lat" id="lat" placeholder=""  />

                                        </div>
                                        <!--end::Input-->
                                    </div>

                                    <div class="col">
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label class="form-label"> خطوط الطول   <span style="color: #ec0c24">*</span></label>
                                            <input type="text" class="form-control" name="lng" id="lng" placeholder=""  />
                                        </div>
                                        <!--end::Input-->
                                    </div>


                                </div>

                                <div class="row">

                                    <div class="col">
                                        <label for="inputName" class="control-label">نوع التعاقد <span style="color: #ec0c24">*</span></label>
                                        <select name="typeOfContract" class="form-control SlectBox" >
                                            <option value="بدل">بدل</option>
                                            <option value="ملك">ملك</option>
                                            <option value="ايجار">ايجار</option>
                                        </select>
                                    </div>




                                </div>

                                <div class="row">

                                    <div class="col">
                                        <div class="form-group"><br><br>
                                            <label >مؤسسة    </label>
                                            <input type="radio" value="فرد"  class="" name="ownerType"  onclick="showInstitution()" />
                                            <label >فرد   </label>
                                            <input type="radio" value="مؤسسة"  checked class="" name="ownerType"   onclick="showSingle()" />


                                        </div>

                                    </div>


                                    <div class="col">
                                        <label for="inputName" class="control-label"> نوع الحيازة  <span style="color: #ec0c24">*</span></label>
                                        <select name="" class="form-control SlectBox" >

                                            <option value="س">س</option>
                                            <option value="ص">ص</option>
                                            <option value="ع">ع</option>
                                        </select>
                                    </div>



                                </div>

                                <div class="row" id="single" >
                                    <div class="col">
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label >اسم المالك   <span style="color: #ec0c24">*</span> </label>
                                            <input type="text" class="form-control" name="owner" id="idNumber" placeholder=""  />

                                        </div>
                                        <!--end::Input-->
                                    </div>

                                    <div class="col">
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label class="form-label"> رقم الهوية   <span style="color: #ec0c24">*</span></label>
                                            <input type="text" class="form-control" name="idNumber" id="idNumber2" placeholder=""  />
                                        </div>
                                        <!--end::Input-->
                                    </div>


                                </div>

                                <div class="row" id="institution" >
                                    <div class="col">
                                        <label for="inputName" class="control-label">نوع المؤسسة <span style="color: #ec0c24">*</span></label>
                                        <select name="institutionType" class="form-control SlectBox" >
                                            <option value="اهلية">اهلية</option>
                                            <option value="دينية">دينية</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label>  رقم المؤسسة  <span style="color: #ec0c24">*</span></label>
                                            <input type="text" class="form-control" name="institutionNumber" id="institutionNumber"  />
                                        </div>
                                        <!--end::Input-->
                                    </div>
                                    <div class="col">
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label>اسم المؤسسة</label>
                                            <input type="text" class="form-control" name="institutionName"  id="institutionName"   />
                                        </div>
                                        <!--end::Input-->
                                    </div>


                                    <div class="col" >
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label>  رقم هوية ممثل المؤسسة  <span style="color: #ec0c24">*</span></label>
                                            <input type="text" class="form-control" name="idInstitutionNumber"  id="idInstitutionNumber"  />
                                        </div>
                                        <!--end::Input-->
                                    </div>
                                    <div class="col">
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label>اسم ممثل المؤسسة</label>
                                            <input type="text" class="form-control" name="personInstitutionName" id="personInstitutionName"    />
                                        </div>
                                        <!--end::Input-->
                                    </div>


                                </div>

                                <div class="row">
                                    <div class="col-xl-3">
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label>الاسم</label>
                                            <input type="text" class="form-control" name="fName" id="fName"  placeholder=""  />
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
                                            <input type="text" class="form-control" name="gName" id="gName"  placeholder=""  />
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
                                            <label >اقرب معلم </label>
                                            <input type="text" class="form-control" name="guide" id="guide" placeholder=""  />

                                        </div>
                                        <!--end::Input-->
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col">
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label>الملاحظات  </label>
                                            <input type="text" class="form-control" name="notes" id="notes"  placeholder=""  />
                                        </div>
                                        <!--end::Input-->
                                    </div>



                                </div>


                                <br>
                                <button class="button_farmer btn btn-success font-weight-bold text-uppercase px-9 py-4">حفظ</button>
                            </form>
                        </div>
                        <div class="pb-5" data-wizard-type="step-content">

                            <div class="card-body">
                                <button onclick="showRowForm1()" class=" btn btn-success  px-6 py-2">اضافة</button>
                                <table class="table  table-checkable" id="kt_datatable1">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>رقم الهوية</th>
                                        <th> الاسم </th>
                                        <th> نوع الشراكة</th>
                                        <th> نسبة الشراكة % </th>
                                        <th>الاجراءت</th>
                                    </tr>
                                    </thead>
                                    <tbody id="partners_datatable">
                                    <tr>
                                        <td>

                                        </td>
                                    </tr>
                                    </tbody>
                                    <tfoot id="test1">
                                    <form method="post" class="partners" id="partners">
                                        <input type="hidden" value="" name="land_id" id="land_id">
                                        <tr>
                                            <td>

                                            </td>
                                            <td>
                                                <input type="number" class="form-control" name="idNumber" id="idNumber"   />
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="name" id="name"   />
                                            </td>
                                            <td>

                                                <select name="partnerType" class="form-control SlectBox" >
                                                    <option value="حيازة"> حيازة</option>
                                                    <option value="ارض">  ارض</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" name="partnershipRatio" id="partnershipRatio"   />
                                            </td>
                                            <td>
                                                <button class="button_add_user btn btn-secondary  px-6 py-2"> حفظ</button>

                                            </td>
                                        </tr>
                                    </form>
                                    </tfoot>
                                </table>
                                <!--end: Datatable-->
                            </div>
                            <hr>
                            <div class="card-body">
                                <button onclick="showRowForm2()" class="addBuilding btn btn-success  px-6 py-2">اضافة</button>

                                <!--begin: Datatable-->
                                <table class="table  table-checkable" id="kt_datatable1">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th> نوع المبنى  </th>
                                        <th> المساحة </th>
                                        <th>  الملكية</th>
                                        <th id="rr" style="display: none;">  نوع المزرعة</th>
                                        <th id="tt" style="display: none;">  نوع سقف المزرعة</th>
                                        <th> ملاحظات </th>
                                        <th>الاجراءت</th>
                                    </tr>
                                    </thead>
                                    <tbody id="building_datatable">
                                    <tr>
                                        <td>

                                        </td>
                                    </tr>
                                    </tbody>
                                    <tfoot id="test2">
                                    <form method="post" class="buildings" id="buildings">
                                        <input type="hidden" value="" name="land_id" id="farmer_id">
                                        <tr>
                                            <td>

                                            </td>
                                            <td>
                                                <select name="type" class="form-control SlectBox" id="mySelect">
                                                    <option  value="مزارع ابقار" >مزارع ابقار </option>
                                                    <option  value="مزارع حبش" >  مزارع حبش</option>
                                                    <option   value="مزارع دواجن" > مزارع دواجن </option>
                                                    <option   value="مزارع اغنام" > مزارع اغنام </option>
                                                    <option   value="كوخ" >كوخ</option>
                                                    <option   value="منزل صغير" >منزل صغير</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" name="area" id="area"   />
                                            </td>
                                            <td >

                                                <select name="ownerBuild" class="form-control SlectBox" >
                                                    <option value="س"> ملك</option>
                                                    <option value="ص">  ايجار</option>
                                                </select>
                                            </td>
                                            <td id="bb" style="display: none;">

                                                <select name="ownerBuild" class="form-control SlectBox" >
                                                    <option value="س"> ملك</option>
                                                    <option value="ص">  ايجار</option>
                                                </select>
                                            </td>
                                            <td id="aa" style="display: none;">

                                                <select name="ownerBuild" class="form-control SlectBox" >
                                                    <option value="س"> ملك</option>
                                                    <option value="ص">  ايجار</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="note" id="note"   />
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
                            <hr>
                            <div class="card-body">
                                <!--begin: Datatable-->
                                <button onclick="showRowForm3()" class="add_irrigation btn btn-success  px-6 py-2">اعتماد </button>

                                <table class="table  table-checkable" id="kt_datatable1">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th> التطبيق  </th>
                                        <th> القيمة </th>
                                        <th>الاجراءت</th>
                                    </tr>
                                    </thead>
                                    <tbody id="irrigation_datatable">
                                    <tr>
                                        <td>

                                        </td>
                                    </tr>
                                    </tbody>
                                    <tfoot id="test3">
                                    <form method="post" class="irrigation" id="irrigation">
                                        <input type="hidden" value="" name="land_id" id="farmer_id">
                                        <tr>
                                            <td>

                                            </td>
                                            <td>
                                                <select name="type" class="form-control SlectBox" id="mySelect2">
                                                    <option  value="بئر" > بئر </option>
                                                    <option selected="selected" value="خزان علوي" >خزان علوي</option>
                                                    <option   value="مياه ارضية" >مياه ارضية</option>
                                                </select>
                                            </td>
                                            <td>
                                                <div id="a1" style="display: k;">
                                                    <label>السعة</label>
                                                    <input type="number" class="form-control" name="capacity" id="number"   />
                                                </div>
                                                <div id="a2" style="display: k;">
                                                    <label>الارتفاع</label>
                                                    <input type="number" class="form-control" name="height" id="number"   />
                                                </div>
                                                <div id="a3" style="display: none;">
                                                    <label>رقم البئر</label>
                                                    <input type="number" class="form-control" name="wellNumber" id="number"   />
                                                </div>

                                                <div id="a4" style="display: none;">
                                                    <label>عمق البئر في المتر</label>
                                                    <input type="number" class="form-control" name="depthWellMeter" id="number"   />
                                                </div>

                                                <div id="a5" style="display: none;">
                                                    <label>قوة الدفع بالحصان</label>
                                                    <input type="number" class="form-control" name="energy" id="number"   />
                                                </div>

                                                <div id="a6" style="display: none;">
                                                    <label>الكهرباء</label>
                                                    <input type="number" class="form-control" name="electricity" id="number"   />
                                                </div>

                                                <div id="a7" style="display: none;">
                                                    <label>العمق</label>
                                                    <input type="number" class="form-control" name="depth" id="number"   />
                                                </div>

                                                <div id="a8" style="display: none;">
                                                    <label>نوع البركة</label>
                                                    <select name="pondType" class="form-control SlectBox" id="mySelect2">
                                                        <option  value="س" >مزارع ابقار </option>
                                                        <option  value="ص" >  مزارع حبش</option>
                                                        <option  value="ع" >  مزارع حبش</option>
                                                    </select>
                                                </div>

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

                            <div class="card-body">
                                <!--begin: Datatable-->
                                <button onclick="showRowForm4()" class="add_crops btn btn-success  px-6 py-2">اضافة</button>

                                <table class="table table-separate table-head-custom table-checkable" id="kt_datatable1">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>الصنف </th>
                                        <th>تاريخ الزراعة</th>
                                        <th>المساحة</th>
                                        <th>وضع المحصول </th>
                                        <th>طريقة الري</th>
                                        <th> كساد</th>
                                        <th id="q3" style="display: none"> سبب الكساد</th>
                                        <th id="q4" style="display: none">  تاريخ انتهاء المحصول</th>

                                        <th>الاجراءت</th>
                                    </tr>
                                    </thead>
                                    <tbody id="crops_datatable">
                                    <tr>

                                    </tr>
                                    </tbody>
                                    <tfoot id="test4">
                                    <tr>
                                        <form id="crops" class="crops" action="" method="post" >
                                            @csrf
                                            <input type="hidden" value="" id="land_id" name="land_id">
                                            <td>

                                            </td>
                                            <td>
                                                <select name="item" class="form-control SlectBox" >

                                                    <option value="س"> ذكر</option>
                                                    <option value="ص"> انثى</option>
                                                    <option value="ع"> انثى</option>

                                                </select>
                                            </td>
                                            <td>

                                                <input type="date" class="form-control" name="agricultureHistory" id="agricultureHistory"   />
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" name="cultivatedArea" id="name"    />
                                            </td>
                                            <td>
                                                <select name="crop" class="form-control SlectBox" >

                                                    <option value="س"> ذكر</option>
                                                    <option value="ص"> انثى</option>
                                                    <option value="ع"> انثى</option>

                                                </select>
                                            </td>
                                            <td>
                                                <select name="irrigationMethod" class="form-control SlectBox" >

                                                    <option value="س"> ذكر</option>
                                                    <option value="ص"> انثى</option>

                                                </select>
                                            </td>
                                            <td>
                                                <input name="depression" value="true"  type="checkbox" id="checkedid"  />
                                            </td>
                                            <td id="q1" style="display: none">
                                                <input type="text" class="form-control" name="causeDepression" id="name"  placeholder="enter name"  />
                                            </td>
                                            <td id="q2" style="display: none">
                                                <input type="date" class="form-control" name="endDate" id="endDate"  placeholder="enter name"  />
                                            </td>
                                            <td>
                                                <button class="btn btn-secondary  px-6 py-2">حفظ</button>

                                            </td>
                                        </form>
                                    </tr>
                                    </tfoot>
                                </table>
                                <!--end: Datatable-->
                            </div>
                            <hr>
                            <div class="card-body">
                                <!--begin: Datatable-->
                                <button onclick="showRowForm5()" class="add_vegetables btn btn-success  px-6 py-2">اضافة</button>

                                <table class="table table-separate table-head-custom table-checkable" id="kt_datatable1">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>  اسم الصنف </th>
                                        <th>   تاريخ الزراعة</th>
                                        <th> المساحة المزروعة</th>
                                        <th>الحماية</th>
                                        <th>نوع الحماية </th>

                                        <th>الاجراءت</th>
                                    </tr>
                                    </thead>
                                    <tbody id="Vegetables_datatable">
                                    <tr>

                                    </tr>
                                    </tbody>
                                    <tfoot id="test5">
                                    <tr>
                                        <form id="vegetables" class="vegetables" action="" method="post" >
                                            @csrf
                                            <input type="hidden" value="" id="land_id" name="land_id">
                                            <td>

                                            </td>
                                            <td>
                                                <select name="item" class="form-control SlectBox" >

                                                    <option value="بندورة"> بندورة</option>
                                                    <option value="بطاطا"> بطاطا</option>
                                                    <option value="خيار">خيار</option>

                                                </select>
                                            </td>
                                            <td>
                                                <input type="date" class="form-control" name="date" id="date"    />
                                            </td>
                                            <td>

                                                <input type="number" class="form-control" name="area" id="area"    />
                                            </td>
                                            <td>

                                                <select name="protection" class="form-control SlectBox" >

                                                    <option value="س"> س</option>
                                                    <option value="ص"> ص</option>

                                                </select>
                                            </td>
                                            <td>
                                                <select name="protectionType" class="form-control SlectBox" >

                                                    <option value="س"> س</option>
                                                    <option value="ص"> ص</option>

                                                </select>
                                            </td>
                                            <td>
                                                <button class=" btn btn-secondary  px-6 py-2">حفظ</button>

                                            </td>
                                        </form>
                                    </tr>
                                    </tfoot>
                                </table>
                                <!--end: Datatable-->
                            </div>
                            <hr>
                            <div class="card-body">
                                <!--begin: Datatable-->
                                <button onclick="showRowForm6()" class="add_trees btn btn-success  px-6 py-2">اضافة</button>
                                <table class="table table-separate table-head-custom table-checkable" id="kt_datatable1">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>  اسم الصنف </th>
                                        <th> تاريخ الزراعة</th>
                                        <th> المساحة المزروعة</th>
                                        <th> عدد الاشجار </th>
                                        <th>طريقة الري</th>
                                        <th>الحماية</th>
                                        <th>الاجراءت</th>
                                    </tr>
                                    </thead>
                                    <tbody id="tree">
                                    <tr>

                                    </tr>
                                    </tbody>
                                    <tfoot id="test6">
                                    <tr>
                                        <form id="trees" class="trees" action="" method="post" >
                                            @csrf
                                            <input type="hidden" value="" id="land_id" name="land_id">
                                            <td>

                                            </td>
                                            <td>
                                                <select name="item" class="form-control SlectBox" >

                                                    <option value="بندورة"> بندورة</option>
                                                    <option value="بطاطا"> بطاطا</option>
                                                    <option value="خيار">خيار</option>

                                                </select>
                                            </td>
                                            <td>

                                                <input type="date" class="form-control" name="date" id="date"    />
                                            </td>
                                            <td>

                                                <input type="number" class="form-control" name="area" id="area"    />
                                            </td>
                                            <td>
                                                <select name="treeNumber" class="form-control SlectBox" >

                                                    <option value="10"> 10</option>
                                                    <option value="20"> 20</option>
                                                    <option value="30"> 30</option>

                                                </select>
                                            </td>
                                            <td>
                                                <select name="irrigationMethod" class="form-control SlectBox" >

                                                    <option value="س"> س</option>
                                                    <option value="ص"> ص</option>

                                                </select>
                                            </td>
                                            <td>
                                                <select name="protection" class="form-control SlectBox" >

                                                    <option value="س"> س</option>
                                                    <option value="ص"> ص</option>

                                                </select>
                                            </td>

                                            <td>
                                                <button class="btn btn-secondary  px-6 py-2">حفظ</button>

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
                                <!--begin: Datatable-->
                                <button onclick="showRowForm7()" class="add_poultry btn btn-success  px-6 py-2">اضافة</button>
                                <table class="table table-separate table-head-custom table-checkable" id="kt_datatable1">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>  النوع </th>
                                        <th>    المساحة</th>
                                        <th>  نوع المزرعة</th>
                                        <th>سقف المزرعة</th>
                                        <th>العدد  </th>
                                        <th>العمر  </th>

                                        <th>الاجراءت</th>
                                    </tr>
                                    </thead>
                                    <tbody id="poultry_datatable">
                                    <tr>

                                    </tr>
                                    </tbody>
                                    <tfoot id="test7">
                                    <tr>
                                        <form id="poultry" class="poultry" action="" method="post" >
                                            @csrf
                                            <input type="hidden" value="" id="land_id" name="land_id">
                                            <td>

                                            </td>
                                            <td>
                                                <select name="type" class="form-control SlectBox" >

                                                    <option value="دواجن"> دواجن</option>
                                                    <option value="ابقار"> ابقار</option>
                                                    <option value="اغنام">اغنام</option>

                                                </select>
                                            </td>
                                            <td>

                                                <input type="number" class="form-control" name="area" id="area"    />
                                            </td>
                                            <td>

                                                <select name="farmerType" class="form-control SlectBox" >

                                                    <option value="س"> س</option>
                                                    <option value="ص"> ص</option>

                                                </select>
                                            </td>
                                            <td>
                                                <select name="roof" class="form-control SlectBox" >

                                                    <option value="س"> س</option>
                                                    <option value="ص"> ص</option>

                                                </select>
                                            </td>
                                            <td>

                                                <input type="number" class="form-control" name="number" id="number"    />
                                            </td>

                                            <td>
                                                <select name="age" class="form-control SlectBox" >

                                                    <option value="20"> 20</option>
                                                    <option value="40"> 40</option>

                                                </select>
                                            </td>
                                            <td>
                                                <button class="btn btn-secondary  px-6 py-2">حفظ</button>

                                            </td>
                                        </form>
                                    </tr>
                                    </tfoot>
                                </table>
                                <!--end: Datatable-->
                            </div>
                            <hr>
                            <div class="card-body">
                                <!--begin: Datatable-->
                                <button onclick="showRowForm8()" class="add_cattle btn btn-success  px-6 py-2">اضافة</button>
                                <table class="table table-separate table-head-custom table-checkable" id="kt_datatable1">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>  النوع </th>
                                        <th>    المساحة</th>
                                        <th>  نوع المزرعة</th>
                                        <th>سقف المزرعة</th>
                                        <th>العدد  </th>

                                        <th>الاجراءت</th>
                                    </tr>
                                    </thead>
                                    <tbody id="cattle_datatable">
                                    <tr>

                                    </tr>
                                    </tbody>
                                    <tfoot id="test8">
                                    <tr>
                                        <form id="cattle" class="cattle" action="" method="post" >
                                            @csrf
                                            <input type="hidden" value="" id="land_id" name="land_id">
                                            <td>

                                            </td>
                                            <td>
                                                <select name="type" class="form-control SlectBox" >

                                                    <option value="دواجن"> دواجن</option>
                                                    <option value="ابقار"> ابقار</option>
                                                    <option value="اغنام">اغنام</option>

                                                </select>
                                            </td>
                                            <td>

                                                <input type="number" class="form-control" name="area" id="area"    />
                                            </td>
                                            <td>

                                                <select name="farmerType" class="form-control SlectBox" >

                                                    <option value="س"> س</option>
                                                    <option value="ص"> ص</option>

                                                </select>
                                            </td>
                                            <td>
                                                <select name="roof" class="form-control SlectBox" >

                                                    <option value="س"> س</option>
                                                    <option value="ص"> ص</option>

                                                </select>
                                            </td>
                                            <td>

                                                <input type="number" class="form-control" name="number" id="number"   />
                                            </td>


                                            <td>
                                                <button class="btn btn-secondary  px-6 py-2">حفظ</button>

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
                                <button onclick="showRowForm9()" class="add_other btn btn-success  px-6 py-2">اضافة</button>

                                <table class="table table-separate table-head-custom table-checkable" id="kt_datatable1">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>  النوع </th>
                                        <th>    المساحة</th>
                                        <th>  نوع المزرعة</th>
                                        <th>العدد  </th>
                                        <th>ملاحظات  </th>
                                        <th>الاجراءت</th>
                                    </tr>
                                    </thead>
                                    <tbody id="other_datatable">
                                    <tr>

                                    </tr>
                                    </tbody>
                                    <tfoot id="test9">
                                    <tr>

                                        <form id="other" class="other" action="" method="post" >
                                            @csrf
                                            <input type="hidden" value="" id="land_id" name="land_id">
                                            <td>

                                            </td>
                                            <td>
                                                <select name="type" class="form-control SlectBox" >

                                                    <option value="دواجن"> دواجن</option>
                                                    <option value="ابقار"> ابقار</option>
                                                    <option value="اغنام">اغنام</option>

                                                </select>
                                            </td>
                                            <td>

                                                <input type="number" class="form-control" name="area" id="area"    />
                                            </td>
                                            <td>

                                                <select name="farmerType" class="form-control SlectBox" >

                                                    <option value="س"> س</option>
                                                    <option value="ص"> ص</option>

                                                </select>
                                            </td>


                                            <td>

                                                <input type="number" class="form-control" name="number" id="number"   />
                                            </td>
                                            <td>

                                                <input type="text" class="form-control" name="notes" id="notes"    />
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
<script src="{{asset('assets/plugins/global/plugins.bundle.js?v=7.0.4')}}"></script>

<script src="{{asset('assets/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.4')}}"></script>
<script src="{{asset('assets/js/scripts.bundle.js?v=7.0.4')}}"></script>
<script src="{{asset('assets/js/pages/custom/wizard/wizard-3.js?v=7.0.4')}}"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

<script>

    $('#test1').hide();
    $('#test2').hide();
    $('#test3').hide();
    $('#test4').hide();
    $('#test5').hide();
    $('#test6').hide();
    $('#test7').hide();
    $('#test8').hide();
    $('#test9').hide();
    $('#institution').hide();
    $('#single').hide();
    function showRowForm1(){
        $('#test1').toggle();
    }
    function showRowForm2(){
        $('#test2').toggle();
    } function showRowForm3(){
        $('#test3').toggle();
    } function showRowForm4(){
        $('#test4').toggle();
    } function showRowForm5(){
        $('#test5').toggle();
    } function showRowForm6(){
        $('#test6').toggle();
    } function showRowForm7(){
        $('#test7').toggle();
    } function showRowForm8(){
        $('#test8').toggle();
    } function showRowForm9(){
        $('#test9').toggle();
    }
    function showSingle(){
        $('#single').show();
        $('#institution').hide();
    }function showInstitution(){
        $('#institution').show();
        $('#single').hide();
    }

    function myFunction(){

        var areaBuildingTenurePurposes = parseFloat(document.getElementById("areaBuildingTenurePurposes").value);
        var areaBuildingNonTenurePurposes = parseFloat(document.getElementById("areaBuildingNonTenurePurposes").value);
        var permanentFallowArea = parseFloat(document.getElementById("permanentFallowArea").value);
        var temporaryFallowSpace = parseFloat(document.getElementById("temporaryFallowSpace").value);
        var cultivatedLandArea = parseFloat(document.getElementById("cultivatedLandArea").value);
        var areaForestTrees = parseFloat(document.getElementById("areaForestTrees").value);

        var result = areaBuildingTenurePurposes + areaBuildingNonTenurePurposes + permanentFallowArea + temporaryFallowSpace +
            cultivatedLandArea + areaForestTrees;

        sum = parseFloat(result).toFixed(2);

        document.getElementById("totalLandArea").value = sum;

    }

    $(document).ready(function () {




        $('#mySelect').change(function(){
            var value = $(this).val();
            var aa = document.getElementById('aa');
            var bb = document.getElementById('bb');
            var rr = document.getElementById('rr');
            var tt = document.getElementById('tt');

            if(value == 'مزارع ابقار' ){
                aa.style.display="";
                bb.style.display="";
                rr.style.display="";
                tt.style.display="";
            }
            if(value == 'مزارع اغنام' ){
                aa.style.display="";
                bb.style.display="";
                rr.style.display="";
                tt.style.display="";
            }if(value == 'مزارع حبش' ){
                aa.style.display="";
                bb.style.display="";
                rr.style.display="";
                tt.style.display="";
            }if(value == 'مزارع دواجن' ){
                aa.style.display="";
                bb.style.display="";
                rr.style.display="";
                tt.style.display="";
            }
            if(value == 'كوخ' ){
                aa.style.display="none";
                bb.style.display="none";
                rr.style.display="none";
                tt.style.display="none";
            }if(value == 'منزل صغير' ){
                aa.style.display="none";
                bb.style.display="none";
                rr.style.display="none";
                tt.style.display="none";
            }

        });

        $('#mySelect2').change(function(){
            var value = $(this).val();
            var a1 = document.getElementById('a1');
            var a2 = document.getElementById('a2');
            var a3 = document.getElementById('a3');
            var a4 = document.getElementById('a4');
            var a5 = document.getElementById('a5');
            var a6 = document.getElementById('a6');
            var a7 = document.getElementById('a7');
            var a8 = document.getElementById('a8');

            if(value == 'بئر' ){
                a1.style.display="none";
                a2.style.display="none";
                a3.style.display="";
                a4.style.display="";
                a5.style.display="";
                a6.style.display="";
                a7.style.display="none";
                a8.style.display="none";
            }

            if(value == 'خزان علوي' ){
                a1.style.display="";
                a2.style.display="";
                a3.style.display="none";
                a4.style.display="none";
                a5.style.display="none";
                a6.style.display="none";
                a7.style.display="none";
                a8.style.display="none";

            }

            if(value == 'مياه ارضية' ){
                a1.style.display="";
                a2.style.display="none";
                a3.style.display="none";
                a4.style.display="none";
                a5.style.display="none";
                a6.style.display="none";
                a7.style.display="";
                a8.style.display="";
            }

        });

        $('#checkedid').change(function(){
            q1.style.display="";
            q2.style.display="";
            q3.style.display="";
            q4.style.display="";
            q5.style.display="";
            q6.style.display="";
        });


        latestLand();
        partners();
        building();
        irrigation();
        crops();
        vegetables();
        trees();
        cattle();
        poultry();
        other();



        function latestLand() {
            $.ajax({
                type: "GET",
                url: "{{route('latestLand')}}",
                dataType: "json",
                success: function (response) {
                    $('input[name="land_id"]').val(response.land.id);
                }
            });
        }

        function partners(){
            $.ajax({
                type:"GET",
                url:"{{route('partners')}}",
                dataType:"json",
                success: function (response) {
                    //console.log(response.data)
                    $('#partners_datatable').html("");
                    $.each(response.partners ,function (key ,item) {
                        $('#partners_datatable').append('<tr>\
                                       <td>'+item.id+'</td>\
                                       <td>'+item.idNumber+'</td>\
                                       <td>'+item.name+'</td>\
                                       <td>'+item.partnerType+'</td>\
                                       <td>'+item.partnershipRatio+'</td>\
                                       <td ><button  type="button" value="'+item.id+'" class=" btn-outline-danger delete_partner">Delete</button> </td>\
                                          </tr>');
                    });
                }
            });
        }

        function building(){
            $.ajax({
                type:"GET",
                url:"{{route('buildings')}}",
                dataType:"json",
                success: function (response) {
                    //console.log(response.data)
                    $('#building_datatable').html("");
                    $.each(response.buildings ,function (key ,item) {
                        $('#building_datatable').append('<tr>\
                                       <td>'+item.id+'</td>\
                                       <td>'+item.type+'</td>\
                                       <td>'+item.area+'</td>\
                                       <td>'+item.ownerBuild+'</td>\
                                       <td>'+item.note+'</td>\
                                       <td ><button  type="button" value="'+item.id+'" class=" btn-outline-danger delete_building">Delete</button>  </td>\
                                          </tr>');
                    });
                }
            });
        }

        function irrigation(){
            $.ajax({
                type:"GET",
                url:"{{route('irrigation')}}",
                dataType:"json",
                success: function (response) {
                    //console.log(response.data)
                    $('#irrigation_datatable').html("");
                    $.each(response.irrigation ,function (key ,item) {
                        $('#irrigation_datatable').append('<tr>\
                                       <td>'+item.id+'</td>\
                                       <td>'+item.type+'</td>\
                                       <td>'+item.capacity+'</td>\
                                       <td ><button  type="button" value="'+item.id+'" class=" btn-outline-danger delete_irrigation">Delete</button>  </td>\
                                          </tr>');
                    });
                }
            });
        }

        function crops(){
            $.ajax({
                type:"GET",
                url:"{{route('crops')}}",
                dataType:"json",
                success: function (response) {
                    //console.log(response.data)
                    $('#crops_datatable').html("");
                    $.each(response.crops ,function (key ,item) {
                        $('#crops_datatable').append('<tr>\
                                       <td>'+item.id+'</td>\
                                       <td>'+item.item+'</td>\
                                       <td>'+item.crop+'</td>\
                                       <td>'+item.agricultureHistory+'</td>\
                                       <td>'+item.cultivatedArea+'</td>\
                                       <td>'+item.irrigationMethod+'</td>\
                                       <td>'+(item.depression == 0 ? 'لا':'نعم')+'</td>\
                                       <td ><button  type="button" value="'+item.id+'" class=" btn-outline-danger delete_crops">Delete</button>  </td>\
                                          </tr>');
                    });
                }
            });
        }

        function vegetables(){
            $.ajax({
                type:"GET",
                url:"{{route('vegetables')}}",
                dataType:"json",
                success: function (response) {
                    //console.log(response.data)
                    $('#Vegetables_datatable').html("");
                    $.each(response.vegetables ,function (key ,item) {
                        $('#Vegetables_datatable').append('<tr>\
                                       <td>'+item.id+'</td>\
                                       <td>'+item.item+'</td>\
                                       <td>'+item.date+'</td>\
                                        <td>'+item.area+'</td>\
                                       <td>'+item.protection+'</td>\
                                       <td>'+item.protectionType+'</td>\
                                       <td ><button  type="button" value="'+item.id+'" class=" btn-outline-danger delete_vegetable">Delete</button>  </td>\
                                          </tr>');
                    });
                }
            });
        }

        function trees(){
            $.ajax({
                type:"GET",
                url:"{{route('trees')}}",
                dataType:"json",
                success: function (response) {
                    //console.log(response.data)
                    $('#tree').html("");
                    $.each(response.trees ,function (key ,item) {
                        $('#tree').append('<tr>\
                                       <td>'+item.id+'</td>\
                                       <td>'+item.item+'</td>\
                                       <td>'+item.date+'</td>\
                                        <td>'+item.area+'</td>\
                                       <td>'+item.treeNumber+'</td>\
                                       <td>'+item.irrigationMethod+'</td>\
                                       <td>'+item.protection+'</td>\
                                       <td ><button  type="button" value="'+item.id+'" class=" btn-outline-danger delete_tree">Delete</button> </td>\
                                          </tr>');
                    });
                }
            });
        }

        function cattle(){
            $.ajax({
                type:"GET",
                url:"{{route('cattle')}}",
                dataType:"json",
                success: function (response) {
                    //console.log(response.data)
                    $('#cattle_datatable').html("");
                    $.each(response.cattle ,function (key ,item) {
                        $('#cattle_datatable').append('<tr>\
                                       <td>'+item.id+'</td>\
                                       <td>'+item.type+'</td>\
                                       <td>'+item.area+'</td>\
                                        <td>'+item.farmerType+'</td>\
                                       <td>'+item.roof+'</td>\
                                       <td>'+item.number+'</td>\
                                       <td ><button  type="button" value="'+item.id+'" class=" btn-outline-danger delete_cattle">Delete</button>  </td>\
                                          </tr>');
                    });
                }
            });
        }

        function poultry(){
            $.ajax({
                type:"GET",
                url:"{{route('poultry')}}",
                dataType:"json",
                success: function (response) {
                    //console.log(response.data)
                    $('#poultry_datatable').html("");
                    $.each(response.poultry ,function (key ,item) {
                        $('#poultry_datatable').append('<tr>\
                                       <td>'+item.id+'</td>\
                                       <td>'+item.type+'</td>\
                                       <td>'+item.area+'</td>\
                                        <td>'+item.farmerType+'</td>\
                                       <td>'+item.roof+'</td>\
                                       <td>'+item.number+'</td>\
                                       <td>'+item.age+'</td>\
                                       <td ><button  type="button" value="'+item.id+'" class=" btn-outline-danger delete_poultry">Delete</button>  </td>\
                                          </tr>');
                    });
                }
            });
        }

        function other(){
            $.ajax({
                type:"GET",
                url:"{{route('other')}}",
                dataType:"json",
                success: function (response) {
                    //console.log(response.data)
                    $('#other_datatable').html("");
                    $.each(response.other ,function (key ,item) {
                        $('#other_datatable').append('<tr>\
                                       <td>'+item.id+'</td>\
                                       <td>'+item.type+'</td>\
                                       <td>'+item.area+'</td>\
                                        <td>'+item.farmerType+'</td>\
                                       <td>'+item.number+'</td>\
                                       <td>'+item.notes+'</td>\
                                       <td ><button  type="button" value="'+item.id+'" class=" btn-outline-danger delete_other">Delete</button>  </td>\
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
                pieceNumber: {
                    required: true,
                    digits: true,
                    maxlength: 8,

                },
                lat: {
                    required: true,
                    number: true,
                    //   cents: true,
                    maxlength: 25,

                },
                lng: {
                    required: true,
                    number: true,
                    //   cents: true,
                    maxlength: 25,

                },
                voucherNumber: {
                    required: true,
                    digits: true,
                    maxlength: 8,

                },
                areaBuildingTenurePurposes: {
                    required: true,
                    digits: true,
                    maxlength: 5,

                },  areaBuildingNonTenurePurposes: {
                    required: true,
                    digits: true,
                    maxlength: 5,

                },permanentFallowArea: {
                    required: true,
                    digits: true,
                    maxlength: 5,

                },temporaryFallowSpace: {
                    required: true,
                    digits: true,
                    maxlength: 5,

                },cultivatedLandArea: {
                    required: true,
                    digits: true,
                    maxlength: 5,

                },areaForestTrees: {
                    required: true,
                    digits: true,
                    maxlength: 5,

                },totalLandArea: {
                    required: true,
                    maxlength: 15,

                },farFromArmisticeLine: {
                    required: true,
                    digits: true,
                    maxlength: 5,

                },idNumber: {
                    required: true,
                    digits: true,
                    maxlength: 9,

                },idNumber2: {
                    required: true,
                    digits: true,
                    maxlength: 9,

                },owner: {
                    required: true,
                    maxlength: 200,

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

                guide: {
                    required: false,
                    rangelength: [0, 200],

                }, notes: {
                    required: false,
                    rangelength: [0, 200],

                },


            },
            messages: {
                pieceNumber: {
                    required: 'رقم القطعة مطلوب',
                    digits: 'القيمة المدخلة يجب ان تكون ارقام',
                    maxlength: 'يجب الكتابة في ثماني خانات كحد اقصى',

                },voucherNumber: {
                    required: 'رقم القسيمة مطلوب',
                    digits: 'القيمة المدخلة يجب ان تكون ارقام',
                    maxlength: 'يجب الكتابة في ثماني خانات كحد اقصى',

                },areaBuildingTenurePurposes: {
                    required: 'يرجى ادخال مساحة المبنى لاغراض الحيازة',
                    digits: 'القيمة المدخلة يجب ان تكون ارقام',
                    maxlength: 'يجب الكتابة في خمس خانات كحد اقصى',

                },
            }, submitHandler: function (form) {


                var formData = new FormData($('.add_land')[0]);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'post',
                    enctype: 'multipart/form-data',
                    url: "{{route('createLand')}}",
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
                        } else if (data.status == 400) {
                            latestLand();
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: data.msg,
                                showConfirmButton: false,
                                timer: 1500
                            })
                            partners();
                            building();
                            irrigation();
                            crops();
                            vegetables();
                            trees();
                            cattle();
                            poultry();
                            other();
                            window.location.reload();
                            $('#kt_form').find('input').val('');
                            $('#display_error').hide();

                        } else {
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

        $("#partners").validate({
            rules: {
                idNumber: {
                    required: true,
                    digits: true,
                    rangelength: [9, 9],

                },
                // cardNumber: {
                //     required: true,
                //     digits: true,
                //
                // },
                // fName: {
                //     required: true,
                //     maxlength: 50,
                // },mName: {
                //     required: true,
                //     maxlength: 50,
                // },gName: {
                //     required: false,
                //     maxlength: 50,
                // },lName: {
                //     required: true,
                //     maxlength: 50,
                // },
                // birthDate: {
                //     required: true,
                //
                // },entryDate: {
                //     required: true,
                //
                // },
                //
                // gender: {
                //     required: false,
                //     required: true,
                // },
                // phone: {
                //     required: false,
                //     digits: true,
                //     rangelength: [7, 10],
                //
                // },
                // guide: {
                //     required: false,
                //     maxlength: 70
                // },
                // email: {
                //     required: false,
                //     email: true
                // },

            },
            messages: {
                // idNumber: {
                //     rangelength: "رقم هوية غير صالح ",
                //     required: "رقم الهوية مطلوب",
                //     digits: "يرجى ادخال ارقام فقط"
                // } ,
                // cardNumber: {
                //     required: "يرجى ادخال رقم البطاقة ",
                //     digits: "الرقم الوظيفي عبارة عن ارقام"
                // },
                // fName: {
                //     required: "يرجى ادخال الاسم",
                //     maxlength: "الاسم اقل من 50 حرف"
                // },mName: {
                //     required: "يرجى ادخال الاسم",
                //     maxlength: "الاسم اقل من 50 حرف"
                // },gName: {
                //     maxlength: "الاسم اقل من 50 حرف"
                // },lName: {
                //     required: "يرجى ادخال الاسم",
                //     maxlength: "الاسم اقل من 50 حرف"
                // },
                // birthDate: {
                //     required: "يرجى ادخال تاريخ الميلاد",
                // },entryDate: {
                //     required: "يرجى ادخال تاريخ الادخال",
                // },
                //
                // gender: {
                //     required: "يرجى اختيار الجنس",
                // },
                // phone: {
                //     digits: "يجب ادخال رقم جوال صالح",
                //     rangelength: "يرجى التاكد من صيغة رقم الجوال",
                // },
                // guide: {
                //
                //     maxlength: "ادخل اقرب معلم في 70 حرف "
                //
                // },
                // email: {
                //     email: "صيغة الايميل غير صحيحة",
                // },

            }, submitHandler: function (form) {


                var formData = new FormData($('.partners')[0]);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'post',
                    enctype: 'multipart/form-data',
                    url: "{{route('createPartner')}}",
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
                        } else if (data.status == 400) {
                            partners();

                            $('#kt_form').find('input').val('');
                            $('#display_error').hide();
                        } else {

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

        $("#buildings").validate({
            rules: {
                // idNumber: {
                //     required: true,
                //     digits: true,
                //     rangelength: [9, 9],
                //
                // },
                // cardNumber: {
                //     required: true,
                //     digits: true,
                //
                // },
                // fName: {
                //     required: true,
                //     maxlength: 50,
                // },mName: {
                //     required: true,
                //     maxlength: 50,
                // },gName: {
                //     required: false,
                //     maxlength: 50,
                // },lName: {
                //     required: true,
                //     maxlength: 50,
                // },
                // birthDate: {
                //     required: true,
                //
                // },entryDate: {
                //     required: true,
                //
                // },
                //
                // gender: {
                //     required: false,
                //     required: true,
                // },
                // phone: {
                //     required: false,
                //     digits: true,
                //     rangelength: [7, 10],
                //
                // },
                // guide: {
                //     required: false,
                //     maxlength: 70
                // },
                // email: {
                //     required: false,
                //     email: true
                // },

            },
            messages: {
                // idNumber: {
                //     rangelength: "رقم هوية غير صالح ",
                //     required: "رقم الهوية مطلوب",
                //     digits: "يرجى ادخال ارقام فقط"
                // } ,
                // cardNumber: {
                //     required: "يرجى ادخال رقم البطاقة ",
                //     digits: "الرقم الوظيفي عبارة عن ارقام"
                // },
                // fName: {
                //     required: "يرجى ادخال الاسم",
                //     maxlength: "الاسم اقل من 50 حرف"
                // },mName: {
                //     required: "يرجى ادخال الاسم",
                //     maxlength: "الاسم اقل من 50 حرف"
                // },gName: {
                //     maxlength: "الاسم اقل من 50 حرف"
                // },lName: {
                //     required: "يرجى ادخال الاسم",
                //     maxlength: "الاسم اقل من 50 حرف"
                // },
                // birthDate: {
                //     required: "يرجى ادخال تاريخ الميلاد",
                // },entryDate: {
                //     required: "يرجى ادخال تاريخ الادخال",
                // },
                //
                // gender: {
                //     required: "يرجى اختيار الجنس",
                // },
                // phone: {
                //     digits: "يجب ادخال رقم جوال صالح",
                //     rangelength: "يرجى التاكد من صيغة رقم الجوال",
                // },
                // guide: {
                //
                //     maxlength: "ادخل اقرب معلم في 70 حرف "
                //
                // },
                // email: {
                //     email: "صيغة الايميل غير صحيحة",
                // },

            }, submitHandler: function (form) {


                var formData = new FormData($('.buildings')[0]);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'post',
                    enctype: 'multipart/form-data',
                    url: "{{route('createbuildings')}}",
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
                        } else if (data.status == 400) {
                            building();

                            $('#kt_form').find('input').val('');
                            $('#display_error').hide();
                        } else {

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

        $("#irrigation").validate({
            rules: {
                // idNumber: {
                //     required: true,
                //     digits: true,
                //     rangelength: [9, 9],
                //
                // },
                // cardNumber: {
                //     required: true,
                //     digits: true,
                //
                // },
                // fName: {
                //     required: true,
                //     maxlength: 50,
                // },mName: {
                //     required: true,
                //     maxlength: 50,
                // },gName: {
                //     required: false,
                //     maxlength: 50,
                // },lName: {
                //     required: true,
                //     maxlength: 50,
                // },
                // birthDate: {
                //     required: true,
                //
                // },entryDate: {
                //     required: true,
                //
                // },
                //
                // gender: {
                //     required: false,
                //     required: true,
                // },
                // phone: {
                //     required: false,
                //     digits: true,
                //     rangelength: [7, 10],
                //
                // },
                // guide: {
                //     required: false,
                //     maxlength: 70
                // },
                // email: {
                //     required: false,
                //     email: true
                // },

            },
            messages: {
                // idNumber: {
                //     rangelength: "رقم هوية غير صالح ",
                //     required: "رقم الهوية مطلوب",
                //     digits: "يرجى ادخال ارقام فقط"
                // } ,
                // cardNumber: {
                //     required: "يرجى ادخال رقم البطاقة ",
                //     digits: "الرقم الوظيفي عبارة عن ارقام"
                // },
                // fName: {
                //     required: "يرجى ادخال الاسم",
                //     maxlength: "الاسم اقل من 50 حرف"
                // },mName: {
                //     required: "يرجى ادخال الاسم",
                //     maxlength: "الاسم اقل من 50 حرف"
                // },gName: {
                //     maxlength: "الاسم اقل من 50 حرف"
                // },lName: {
                //     required: "يرجى ادخال الاسم",
                //     maxlength: "الاسم اقل من 50 حرف"
                // },
                // birthDate: {
                //     required: "يرجى ادخال تاريخ الميلاد",
                // },entryDate: {
                //     required: "يرجى ادخال تاريخ الادخال",
                // },
                //
                // gender: {
                //     required: "يرجى اختيار الجنس",
                // },
                // phone: {
                //     digits: "يجب ادخال رقم جوال صالح",
                //     rangelength: "يرجى التاكد من صيغة رقم الجوال",
                // },
                // guide: {
                //
                //     maxlength: "ادخل اقرب معلم في 70 حرف "
                //
                // },
                // email: {
                //     email: "صيغة الايميل غير صحيحة",
                // },

            }, submitHandler: function (form) {


                var formData = new FormData($('.irrigation')[0]);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'post',
                    enctype: 'multipart/form-data',
                    url: "{{route('createirrigation')}}",
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
                        } else if (data.status == 400) {
                            irrigation();

                            $('#kt_form').find('input').val('');
                            $('#display_error').hide();
                        } else {

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

        $("#crops").validate({
            rules: {
                // idNumber: {
                //     required: true,
                //     digits: true,
                //     rangelength: [9, 9],
                //
                // },
                // cardNumber: {
                //     required: true,
                //     digits: true,
                //
                // },
                // fName: {
                //     required: true,
                //     maxlength: 50,
                // },mName: {
                //     required: true,
                //     maxlength: 50,
                // },gName: {
                //     required: false,
                //     maxlength: 50,
                // },lName: {
                //     required: true,
                //     maxlength: 50,
                // },
                // birthDate: {
                //     required: true,
                //
                // },entryDate: {
                //     required: true,
                //
                // },
                //
                // gender: {
                //     required: false,
                //     required: true,
                // },
                // phone: {
                //     required: false,
                //     digits: true,
                //     rangelength: [7, 10],
                //
                // },
                // guide: {
                //     required: false,
                //     maxlength: 70
                // },
                // email: {
                //     required: false,
                //     email: true
                // },

            },
            messages: {
                // idNumber: {
                //     rangelength: "رقم هوية غير صالح ",
                //     required: "رقم الهوية مطلوب",
                //     digits: "يرجى ادخال ارقام فقط"
                // } ,
                // cardNumber: {
                //     required: "يرجى ادخال رقم البطاقة ",
                //     digits: "الرقم الوظيفي عبارة عن ارقام"
                // },
                // fName: {
                //     required: "يرجى ادخال الاسم",
                //     maxlength: "الاسم اقل من 50 حرف"
                // },mName: {
                //     required: "يرجى ادخال الاسم",
                //     maxlength: "الاسم اقل من 50 حرف"
                // },gName: {
                //     maxlength: "الاسم اقل من 50 حرف"
                // },lName: {
                //     required: "يرجى ادخال الاسم",
                //     maxlength: "الاسم اقل من 50 حرف"
                // },
                // birthDate: {
                //     required: "يرجى ادخال تاريخ الميلاد",
                // },entryDate: {
                //     required: "يرجى ادخال تاريخ الادخال",
                // },
                //
                // gender: {
                //     required: "يرجى اختيار الجنس",
                // },
                // phone: {
                //     digits: "يجب ادخال رقم جوال صالح",
                //     rangelength: "يرجى التاكد من صيغة رقم الجوال",
                // },
                // guide: {
                //
                //     maxlength: "ادخل اقرب معلم في 70 حرف "
                //
                // },
                // email: {
                //     email: "صيغة الايميل غير صحيحة",
                // },

            }, submitHandler: function (form) {


                var formData = new FormData($('.crops')[0]);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'post',
                    enctype: 'multipart/form-data',
                    url: "{{route('createCrops')}}",
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
                        } else if (data.status == 400) {
                            crops();

                            $('#kt_form').find('input').val('');
                            $('#display_error').hide();
                        } else {

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

        $("#vegetables").validate({
            rules: {
                // idNumber: {
                //     required: true,
                //     digits: true,
                //     rangelength: [9, 9],
                //
                // },
                // cardNumber: {
                //     required: true,
                //     digits: true,
                //
                // },
                // fName: {
                //     required: true,
                //     maxlength: 50,
                // },mName: {
                //     required: true,
                //     maxlength: 50,
                // },gName: {
                //     required: false,
                //     maxlength: 50,
                // },lName: {
                //     required: true,
                //     maxlength: 50,
                // },
                // birthDate: {
                //     required: true,
                //
                // },entryDate: {
                //     required: true,
                //
                // },
                //
                // gender: {
                //     required: false,
                //     required: true,
                // },
                // phone: {
                //     required: false,
                //     digits: true,
                //     rangelength: [7, 10],
                //
                // },
                // guide: {
                //     required: false,
                //     maxlength: 70
                // },
                // email: {
                //     required: false,
                //     email: true
                // },

            },
            messages: {
                // idNumber: {
                //     rangelength: "رقم هوية غير صالح ",
                //     required: "رقم الهوية مطلوب",
                //     digits: "يرجى ادخال ارقام فقط"
                // } ,
                // cardNumber: {
                //     required: "يرجى ادخال رقم البطاقة ",
                //     digits: "الرقم الوظيفي عبارة عن ارقام"
                // },
                // fName: {
                //     required: "يرجى ادخال الاسم",
                //     maxlength: "الاسم اقل من 50 حرف"
                // },mName: {
                //     required: "يرجى ادخال الاسم",
                //     maxlength: "الاسم اقل من 50 حرف"
                // },gName: {
                //     maxlength: "الاسم اقل من 50 حرف"
                // },lName: {
                //     required: "يرجى ادخال الاسم",
                //     maxlength: "الاسم اقل من 50 حرف"
                // },
                // birthDate: {
                //     required: "يرجى ادخال تاريخ الميلاد",
                // },entryDate: {
                //     required: "يرجى ادخال تاريخ الادخال",
                // },
                //
                // gender: {
                //     required: "يرجى اختيار الجنس",
                // },
                // phone: {
                //     digits: "يجب ادخال رقم جوال صالح",
                //     rangelength: "يرجى التاكد من صيغة رقم الجوال",
                // },
                // guide: {
                //
                //     maxlength: "ادخل اقرب معلم في 70 حرف "
                //
                // },
                // email: {
                //     email: "صيغة الايميل غير صحيحة",
                // },

            }, submitHandler: function (form) {


                var formData = new FormData($('.vegetables')[0]);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'post',
                    enctype: 'multipart/form-data',
                    url: "{{route('createVegetable')}}",
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
                        } else if (data.status == 400) {
                            vegetables();

                            $('#kt_form').find('input').val('');
                            $('#display_error').hide();
                        } else {

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

        $("#trees").validate({
            rules: {
                // idNumber: {
                //     required: true,
                //     digits: true,
                //     rangelength: [9, 9],
                //
                // },
                // cardNumber: {
                //     required: true,
                //     digits: true,
                //
                // },
                // fName: {
                //     required: true,
                //     maxlength: 50,
                // },mName: {
                //     required: true,
                //     maxlength: 50,
                // },gName: {
                //     required: false,
                //     maxlength: 50,
                // },lName: {
                //     required: true,
                //     maxlength: 50,
                // },
                // birthDate: {
                //     required: true,
                //
                // },entryDate: {
                //     required: true,
                //
                // },
                //
                // gender: {
                //     required: false,
                //     required: true,
                // },
                // phone: {
                //     required: false,
                //     digits: true,
                //     rangelength: [7, 10],
                //
                // },
                // guide: {
                //     required: false,
                //     maxlength: 70
                // },
                // email: {
                //     required: false,
                //     email: true
                // },

            },
            messages: {
                // idNumber: {
                //     rangelength: "رقم هوية غير صالح ",
                //     required: "رقم الهوية مطلوب",
                //     digits: "يرجى ادخال ارقام فقط"
                // } ,
                // cardNumber: {
                //     required: "يرجى ادخال رقم البطاقة ",
                //     digits: "الرقم الوظيفي عبارة عن ارقام"
                // },
                // fName: {
                //     required: "يرجى ادخال الاسم",
                //     maxlength: "الاسم اقل من 50 حرف"
                // },mName: {
                //     required: "يرجى ادخال الاسم",
                //     maxlength: "الاسم اقل من 50 حرف"
                // },gName: {
                //     maxlength: "الاسم اقل من 50 حرف"
                // },lName: {
                //     required: "يرجى ادخال الاسم",
                //     maxlength: "الاسم اقل من 50 حرف"
                // },
                // birthDate: {
                //     required: "يرجى ادخال تاريخ الميلاد",
                // },entryDate: {
                //     required: "يرجى ادخال تاريخ الادخال",
                // },
                //
                // gender: {
                //     required: "يرجى اختيار الجنس",
                // },
                // phone: {
                //     digits: "يجب ادخال رقم جوال صالح",
                //     rangelength: "يرجى التاكد من صيغة رقم الجوال",
                // },
                // guide: {
                //
                //     maxlength: "ادخل اقرب معلم في 70 حرف "
                //
                // },
                // email: {
                //     email: "صيغة الايميل غير صحيحة",
                // },

            }, submitHandler: function (form) {


                var formData = new FormData($('.trees')[0]);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'post',
                    enctype: 'multipart/form-data',
                    url: "{{route('createTree')}}",
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
                        } else if (data.status == 400) {
                            trees();

                            $('#kt_form').find('input').val('');
                            $('#display_error').hide();
                        } else {

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

        $("#poultry").validate({
            rules: {
                // idNumber: {
                //     required: true,
                //     digits: true,
                //     rangelength: [9, 9],
                //
                // },
                // cardNumber: {
                //     required: true,
                //     digits: true,
                //
                // },
                // fName: {
                //     required: true,
                //     maxlength: 50,
                // },mName: {
                //     required: true,
                //     maxlength: 50,
                // },gName: {
                //     required: false,
                //     maxlength: 50,
                // },lName: {
                //     required: true,
                //     maxlength: 50,
                // },
                // birthDate: {
                //     required: true,
                //
                // },entryDate: {
                //     required: true,
                //
                // },
                //
                // gender: {
                //     required: false,
                //     required: true,
                // },
                // phone: {
                //     required: false,
                //     digits: true,
                //     rangelength: [7, 10],
                //
                // },
                // guide: {
                //     required: false,
                //     maxlength: 70
                // },
                // email: {
                //     required: false,
                //     email: true
                // },

            },
            messages: {
                // idNumber: {
                //     rangelength: "رقم هوية غير صالح ",
                //     required: "رقم الهوية مطلوب",
                //     digits: "يرجى ادخال ارقام فقط"
                // } ,
                // cardNumber: {
                //     required: "يرجى ادخال رقم البطاقة ",
                //     digits: "الرقم الوظيفي عبارة عن ارقام"
                // },
                // fName: {
                //     required: "يرجى ادخال الاسم",
                //     maxlength: "الاسم اقل من 50 حرف"
                // },mName: {
                //     required: "يرجى ادخال الاسم",
                //     maxlength: "الاسم اقل من 50 حرف"
                // },gName: {
                //     maxlength: "الاسم اقل من 50 حرف"
                // },lName: {
                //     required: "يرجى ادخال الاسم",
                //     maxlength: "الاسم اقل من 50 حرف"
                // },
                // birthDate: {
                //     required: "يرجى ادخال تاريخ الميلاد",
                // },entryDate: {
                //     required: "يرجى ادخال تاريخ الادخال",
                // },
                //
                // gender: {
                //     required: "يرجى اختيار الجنس",
                // },
                // phone: {
                //     digits: "يجب ادخال رقم جوال صالح",
                //     rangelength: "يرجى التاكد من صيغة رقم الجوال",
                // },
                // guide: {
                //
                //     maxlength: "ادخل اقرب معلم في 70 حرف "
                //
                // },
                // email: {
                //     email: "صيغة الايميل غير صحيحة",
                // },

            }, submitHandler: function (form) {


                var formData = new FormData($('.poultry')[0]);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'post',
                    enctype: 'multipart/form-data',
                    url: "{{route('createPoultry')}}",
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
                        } else if (data.status == 400) {
                            poultry();

                            $('#kt_form').find('input').val('');
                            $('#display_error').hide();
                        } else {

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

        $("#cattle").validate({
            rules: {
                // idNumber: {
                //     required: true,
                //     digits: true,
                //     rangelength: [9, 9],
                //
                // },
                // cardNumber: {
                //     required: true,
                //     digits: true,
                //
                // },
                // fName: {
                //     required: true,
                //     maxlength: 50,
                // },mName: {
                //     required: true,
                //     maxlength: 50,
                // },gName: {
                //     required: false,
                //     maxlength: 50,
                // },lName: {
                //     required: true,
                //     maxlength: 50,
                // },
                // birthDate: {
                //     required: true,
                //
                // },entryDate: {
                //     required: true,
                //
                // },
                //
                // gender: {
                //     required: false,
                //     required: true,
                // },
                // phone: {
                //     required: false,
                //     digits: true,
                //     rangelength: [7, 10],
                //
                // },
                // guide: {
                //     required: false,
                //     maxlength: 70
                // },
                // email: {
                //     required: false,
                //     email: true
                // },

            },
            messages: {
                // idNumber: {
                //     rangelength: "رقم هوية غير صالح ",
                //     required: "رقم الهوية مطلوب",
                //     digits: "يرجى ادخال ارقام فقط"
                // } ,
                // cardNumber: {
                //     required: "يرجى ادخال رقم البطاقة ",
                //     digits: "الرقم الوظيفي عبارة عن ارقام"
                // },
                // fName: {
                //     required: "يرجى ادخال الاسم",
                //     maxlength: "الاسم اقل من 50 حرف"
                // },mName: {
                //     required: "يرجى ادخال الاسم",
                //     maxlength: "الاسم اقل من 50 حرف"
                // },gName: {
                //     maxlength: "الاسم اقل من 50 حرف"
                // },lName: {
                //     required: "يرجى ادخال الاسم",
                //     maxlength: "الاسم اقل من 50 حرف"
                // },
                // birthDate: {
                //     required: "يرجى ادخال تاريخ الميلاد",
                // },entryDate: {
                //     required: "يرجى ادخال تاريخ الادخال",
                // },
                //
                // gender: {
                //     required: "يرجى اختيار الجنس",
                // },
                // phone: {
                //     digits: "يجب ادخال رقم جوال صالح",
                //     rangelength: "يرجى التاكد من صيغة رقم الجوال",
                // },
                // guide: {
                //
                //     maxlength: "ادخل اقرب معلم في 70 حرف "
                //
                // },
                // email: {
                //     email: "صيغة الايميل غير صحيحة",
                // },

            }, submitHandler: function (form) {


                var formData = new FormData($('.cattle')[0]);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'post',
                    enctype: 'multipart/form-data',
                    url: "{{route('createCattle')}}",
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
                        } else if (data.status == 400) {
                            cattle();

                            $('#kt_form').find('input').val('');
                            $('#display_error').hide();
                        } else {

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

        $("#other").validate({
            rules: {
                // idNumber: {
                //     required: true,
                //     digits: true,
                //     rangelength: [9, 9],
                //
                // },
                // cardNumber: {
                //     required: true,
                //     digits: true,
                //
                // },
                // fName: {
                //     required: true,
                //     maxlength: 50,
                // },mName: {
                //     required: true,
                //     maxlength: 50,
                // },gName: {
                //     required: false,
                //     maxlength: 50,
                // },lName: {
                //     required: true,
                //     maxlength: 50,
                // },
                // birthDate: {
                //     required: true,
                //
                // },entryDate: {
                //     required: true,
                //
                // },
                //
                // gender: {
                //     required: false,
                //     required: true,
                // },
                // phone: {
                //     required: false,
                //     digits: true,
                //     rangelength: [7, 10],
                //
                // },
                // guide: {
                //     required: false,
                //     maxlength: 70
                // },
                // email: {
                //     required: false,
                //     email: true
                // },

            },
            messages: {
                // idNumber: {
                //     rangelength: "رقم هوية غير صالح ",
                //     required: "رقم الهوية مطلوب",
                //     digits: "يرجى ادخال ارقام فقط"
                // } ,
                // cardNumber: {
                //     required: "يرجى ادخال رقم البطاقة ",
                //     digits: "الرقم الوظيفي عبارة عن ارقام"
                // },
                // fName: {
                //     required: "يرجى ادخال الاسم",
                //     maxlength: "الاسم اقل من 50 حرف"
                // },mName: {
                //     required: "يرجى ادخال الاسم",
                //     maxlength: "الاسم اقل من 50 حرف"
                // },gName: {
                //     maxlength: "الاسم اقل من 50 حرف"
                // },lName: {
                //     required: "يرجى ادخال الاسم",
                //     maxlength: "الاسم اقل من 50 حرف"
                // },
                // birthDate: {
                //     required: "يرجى ادخال تاريخ الميلاد",
                // },entryDate: {
                //     required: "يرجى ادخال تاريخ الادخال",
                // },
                //
                // gender: {
                //     required: "يرجى اختيار الجنس",
                // },
                // phone: {
                //     digits: "يجب ادخال رقم جوال صالح",
                //     rangelength: "يرجى التاكد من صيغة رقم الجوال",
                // },
                // guide: {
                //
                //     maxlength: "ادخل اقرب معلم في 70 حرف "
                //
                // },
                // email: {
                //     email: "صيغة الايميل غير صحيحة",
                // },

            }, submitHandler: function (form) {


                var formData = new FormData($('.other')[0]);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'post',
                    enctype: 'multipart/form-data',
                    url: "{{route('createOther')}}",
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
                        } else if (data.status == 400) {
                            other();

                            $('#kt_form').find('input').val('');
                            $('#display_error').hide();
                        } else {

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

        $(document).on('click', '.delete_partner', function (e) {
            e.preventDefault();

            var id =  $(this).val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                url: "/delete-partner/" + id,
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    if (response.status == 200) {
                        partners();
                    } else {

                    }
                }
            });
        });

        $(document).on('click', '.delete_other', function (e) {
            e.preventDefault();

            var id =  $(this).val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                url: "/delete-other/" + id,
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    if (response.status == 200) {
                        other();
                    } else {
                        other();
                    }
                }
            });
        });

        $(document).on('click', '.delete_cattle', function (e) {
            e.preventDefault();

            var id =  $(this).val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                url: "/delete-cattle/" + id,
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    if (response.status == 200) {

                    } else {
                        cattle();
                    }
                }
            });
        });

        $(document).on('click', '.delete_tree', function (e) {
            e.preventDefault();

            var id =  $(this).val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                url: "/delete-tree/" + id,
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    if (response.status == 200) {

                    } else {
                        trees();
                    }
                }
            });
        });

        $(document).on('click', '.delete_poultry', function (e) {
            e.preventDefault();

            var id =  $(this).val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                url: "/delete-poultry/" + id,
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    if (response.status == 200) {

                    } else {
                        poultry();
                    }
                }
            });
        });

        $(document).on('click', '.delete_vegetable', function (e) {
            e.preventDefault();

            var id =  $(this).val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                url: "/delete-vegetable/" + id,
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    if (response.status == 200) {

                    } else {
                        vegetables();
                    }
                }
            });
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

        $(document).on('click', '.delete_building', function (e) {
            e.preventDefault();

            var id =  $(this).val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                url: "/delete-buildings/" + id,
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    if (response.status == 200) {

                    } else {
                        building();
                    }
                }
            });
        });

        $(document).on('click', '.delete_irrigation', function (e) {
            e.preventDefault();

            var id =  $(this).val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                url: "/delete-irrigation/" + id,
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    if (response.status == 200) {

                    } else {
                        irrigation();
                    }
                }
            });
        });





    });
</script>
<script>
    var c = document.getElementById('c');
    var e = document.getElementById('e');

    function person(){
        // c.style.display="block";
        e.style.display="none";


    }

    function institute(){

        e.style.display="block";
        c.style.display="none";

    }




</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKZAuxH9xTzD2DLY2nKSPKrgRi2_y0ejs&libraries=places&callback=initAutocomplete&language=ar&region=PS
         async defer"></script>
</body>
</html>
