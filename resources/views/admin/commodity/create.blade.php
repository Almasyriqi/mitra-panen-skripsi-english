@extends('layouts.app')
@section('title', 'Tambah Data Komoditas')
@section('page-title')
<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 w-100   ">
    <h1 class="page-heading d-flex text-dark fw-bold flex-column justify-content-center my-0">
        Tambah Komoditas
    </h1>
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap p-0">
        <!--begin::Info-->
        <div class="d-flex align-items-center flex-wrap mr-1">
            <!--begin::Page Heading-->
            <div class="d-flex align-items-baseline flex-wrap mr-5">
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item text-muted">
                        <a href="" class="text-muted">Kelola Data &nbsp;</a>
                    </li>
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('commodity.index') }}" class="text-muted">Kelola Komoditas &nbsp;</a>
                    </li>
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('commodity.create') }}" class="text-muted">Tambah Komoditas &nbsp;</a>
                    </li>
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page Heading-->
        </div>
        <!--end::Info-->
        <!--begin::Toolbar-->
    </div>
</div>
@endsection
@section('content')
<div class="card card-flush">
    <form action="{{route('commodity.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body fs-6 text-gray-700">
            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> Ada beberapa masalah dengan input Anda.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <!--begin::Stepper-->
            <div class="stepper stepper-pills" id="kt_stepper_example_clickable">
                <!--begin::Nav-->
                <div class="stepper-nav flex-center flex-wrap mb-10">
                    <!--begin::Step 1-->
                    <div class="stepper-item mx-8 my-4 current" data-kt-stepper-element="nav"
                        data-kt-stepper-action="step">
                        <!--begin::Wrapper-->
                        <div class="stepper-wrapper d-flex align-items-center">
                            <!--begin::Icon-->
                            <div class="stepper-icon w-40px h-40px">
                                <i class="stepper-check fas fa-check"></i>
                                <span class="stepper-number">1</span>
                            </div>
                            <!--end::Icon-->

                            <!--begin::Label-->
                            <div class="stepper-label">
                                <h3 class="stepper-title">
                                    Step 1
                                </h3>

                                <div class="stepper-desc">
                                    Umum
                                </div>
                            </div>
                            <!--end::Label-->
                        </div>
                        <!--end::Wrapper-->

                        <!--begin::Line-->
                        <div class="stepper-line h-40px"></div>
                        <!--end::Line-->
                    </div>
                    <!--end::Step 1-->

                    <!--begin::Step 2-->
                    <div class="stepper-item mx-8 my-4" data-kt-stepper-element="nav" data-kt-stepper-action="step">
                        <!--begin::Wrapper-->
                        <div class="stepper-wrapper d-flex align-items-center">
                            <!--begin::Icon-->
                            <div class="stepper-icon w-40px h-40px">
                                <i class="stepper-check fas fa-check"></i>
                                <span class="stepper-number">2</span>
                            </div>
                            <!--begin::Icon-->

                            <!--begin::Label-->
                            <div class="stepper-label">
                                <h3 class="stepper-title">
                                    Step 2
                                </h3>

                                <div class="stepper-desc">
                                    Detail Komoditas
                                </div>
                            </div>
                            <!--end::Label-->
                        </div>
                        <!--end::Wrapper-->

                        <!--begin::Line-->
                        <div class="stepper-line h-40px"></div>
                        <!--end::Line-->
                    </div>
                    <!--end::Step 2-->
                </div>
                <!--end::Nav-->

                <!--begin::Form-->
                <!--begin::Group-->
                <div class="mb-5">
                    <!--begin::Step 1-->
                    <div class="flex-column current" data-kt-stepper-element="content">
                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <!--begin::Label-->
                            <label class="form-label required">Nama Komoditas</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-solid" name="name"
                                placeholder="Cth.Lele" value="{{old('name')}}" />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <!--begin::Label-->
                            <label class="form-label required">Nama Latin Komoditas</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-solid" name="latin_name"
                                placeholder="Cth.Clariidae" value="{{old('latin_name')}}" />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <!--begin::Label-->
                            <label class="form-label required">Durasi Budidaya</label>
                            <!--end::Label-->

                            <div class="input-group">
                                <input type="number" class="form-control form-control-solid" name="duration"
                                    id="duration" placeholder="0" value="{{old('duration')}}">
                                <select class="input-group-text" name="duration_type" id="duration_type">
                                    <option value="bulan">Bulan</option>
                                    <option value="hari">Hari</option>
                                </select>
                            </div>

                        </div>
                        <!--end::Input group-->

                        <div class="fv-row mb-10">
                            <label class="form-label required">Cover Komoditas</label>
                            <input type="file" accept=".jpg, .jpeg, .png" class="form-control form-control-solid"
                                name="cover" />
                        </div>
                    </div>
                    <!--end::Step 1-->

                    <!--begin::Step 2-->
                    <div class="flex-column" data-kt-stepper-element="content">
                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <!--begin::Label-->
                            <label class="form-label">Harga Jual Per Kilogram</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-solid" name="selling_price"
                                id="selling_price" placeholder="Masukkan harga jual" value="{{old('selling_price')}}">
                            <!--begin::Hint-->
                            <div class="text-muted">
                                contoh : Rp 25.000
                            </div>
                            <!--end::Hint-->
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label">Temperatur</label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Ph Air</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <input type="number" class="form-control form-control-solid" name="temp_bottom"
                                            id="temp_bottom" placeholder="0" value="{{old('temp_bottom')}}">
                                        <span class="input-group-text">
                                            °C
                                        </span>
                                        <span class="ms-5 pt-3">-</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <input type="number" class="form-control form-control-solid" name="temp_up"
                                            id="temp_up" placeholder="0" value="{{old('temp_up')}}">
                                        <span class="input-group-text">
                                            °C
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <input type="number" class="form-control form-control-solid" name="ph_bottom"
                                            id="ph_bottom" placeholder="0.0" value="{{old('ph_bottom')}}">
                                        <span class="ms-5 pt-3">-</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <input type="number" class="form-control form-control-solid" name="ph_up" id="ph_up" placeholder="0.0" value="{{old('ph_up')}}">
                                </div>
                            </div>
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label">Ketinggian Air</label>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Jenis Air</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <input type="number" class="form-control form-control-solid" name="water_height_bottom"
                                            id="water_height_bottom" placeholder="0" value="{{old('water_height_bottom')}}">
                                        <span class="input-group-text">
                                            cm
                                        </span>
                                        <span class="ms-5 pt-3">-</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <input type="number" class="form-control form-control-solid" name="water_height_up"
                                            id="water_height_up" placeholder="0" value="{{old('water_height_up')}}">
                                        <span class="input-group-text">
                                            cm
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control form-control-solid" name="water_type" id="water_type" placeholder="Cth. Air Tawar" value="{{old('water_type')}}">
                                </div>
                            </div>
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <!--begin::Label-->
                            <label class="form-label">Persiapan Media Air</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <textarea id="preparation_description" name="preparation_description" class="tox-target">{{{ old('preparation_description') }}}</textarea>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <!--begin::Label-->
                            <label class="form-label">Penebaran Benih</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <textarea id="seeding_description" name="seeding_description" class="tox-target">{{{ old('seeding_description') }}}</textarea>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <!--begin::Label-->
                            <label class="form-label">Masa Budidaya</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <textarea id="cutivation_description" name="cutivation_description" class="tox-target">{{{ old('cutivation_description') }}}</textarea>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                    </div>
                    <!--end::Step 2-->
                </div>
                <!--end::Group-->

                <!--begin::Actions-->
                <div class="d-flex flex-stack">
                    <!--begin::Wrapper-->
                    <div class="me-2">
                        <button type="button" class="btn btn-light btn-active-light-primary"
                            data-kt-stepper-action="previous">
                            Kembali
                        </button>
                    </div>
                    <!--end::Wrapper-->

                    <!--begin::Wrapper-->
                    <div>
                        <button type="submit" class="btn btn-primary" data-kt-stepper-action="submit">
                            <span class="indicator-label">
                                Tambah
                            </span>
                            <span class="indicator-progress">
                                Silahkan tunggu... <span
                                    class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>

                        <button type="button" class="btn btn-primary" data-kt-stepper-action="next">
                            Selanjutnya
                        </button>
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Actions-->
                <!--end::Form-->
            </div>
            <!--end::Stepper-->
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
    // convert input selling price to rupiah
    convertRupiah('selling_price');

    // Stepper lement
    var element = document.querySelector("#kt_stepper_example_clickable");

    // Initialize Stepper
    var stepper = new KTStepper(element);

    // Handle navigation click
    stepper.on("kt.stepper.click", function (stepper) {
        stepper.goTo(stepper.getClickedStepIndex()); // go to clicked step
    });

    // Handle next step
    stepper.on("kt.stepper.next", function (stepper) {
        stepper.goNext(); // go next step
    });

    // Handle previous step
    stepper.on("kt.stepper.previous", function (stepper) {
        stepper.goPrevious(); // go previous step
    });

    // set tinymce
    var selector_tinymce = "#preparation_description, #seeding_description, #cutivation_description";
    setTinyMce(KTThemeMode.getMode(), selector_tinymce);

    // change mode or theme tinymce
    $('a[data-kt-element="mode"]').on('click', function(){
        setTinyMce($(this).attr('data-kt-value'), selector_tinymce);
    });
</script>
@endpush