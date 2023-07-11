@extends('layouts.app')
@section('title', 'Commodity Details')
@section('page-title')
<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 w-100   ">
    <h1 class="page-heading d-flex text-dark fw-bold flex-column justify-content-center my-0">
        Commodity Details
    </h1>
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap p-0">
        <!--begin::Info-->
        <div class="d-flex align-items-center flex-wrap mr-1">
            <!--begin::Page Heading-->
            <div class="d-flex align-items-baseline flex-wrap mr-5">
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item text-muted">
                        <a href="" class="text-muted">Manage Data &nbsp;</a>
                    </li>
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('commodity.index') }}" class="text-muted">Commodities Data &nbsp;</a>
                    </li>
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('commodity.show', $commodity->id) }}" class="text-muted"> Commodity Details &nbsp;</a>
                    </li>
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page Heading-->
        </div>
        @if (Auth::user()->role == 1)
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <button type="button" class="btn btn-sm btn-primary" id="edit">
                <i class="bi bi-pencil-fill"></i> Edit
            </button>
        </div>
        @endif
        <!--end::Info-->
        <!--begin::Toolbar-->
    </div>
</div>
@endsection
@section('content')
<div class="card card-flush">
    <form action="{{route('commodity.update', $commodity->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-body fs-6 text-gray-700">
            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There are some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="mb-5">
                <Label class="form-label required fs-6 fw-bold mt-2 mb-3">Commodity Photo</Label>
                <br>
                <!--begin::Image input-->
                <div class="image-input image-input-outline" data-kt-image-input="true"
                    style="background-image: url({{$commodity->photo_image}})">
                    <!--begin::Image preview wrapper-->
                    <div class="image-input-wrapper w-125px h-125px"
                        style="background-image: url({{$commodity->photo_image}})"></div>
                    <!--end::Image preview wrapper-->

                    <!--begin::Edit button-->
                    <label
                        class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                        data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click"
                        id="btn_edit_cover" title="Change cover">
                        <i class="bi bi-pencil-fill fs-7"></i>

                        <!--begin::Inputs-->
                        <input type="file" name="cover" accept=".png, .jpg, .jpeg" />
                        <input type="hidden" name="cover_remove" />
                        <!--end::Inputs-->
                    </label>
                    <!--end::Edit button-->

                    <!--begin::Cancel button-->
                    <span
                        class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-bs-dismiss="click"
                        id="btn_cancel_cover" title="Cancel cover">
                        <i class="bi bi-x fs-2"></i>
                    </span>
                    <!--end::Cancel button-->

                    <!--begin::Remove button-->
                    <span
                        class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                        data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-bs-dismiss="click"
                        id="btn_remove_cover" title="Remove cover">
                        <i class="bi bi-x fs-2"></i>
                    </span>
                    <!--end::Remove button-->
                </div>
                <!--end::Image input-->
            </div>

            <div class="mb-5">
                <Label class="form-label required fs-6 fw-bold mt-2 mb-3">Commodity Name</Label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Insert Commodity Name"
                    value="{{$commodity->name}}" disabled>
            </div>

            <div class="mb-5">
                <label class="form-label required">Commodity Latin Name</label>
                <input type="text" class="form-control form-control-solid" name="latin_name" id="latin_name" placeholder="Exp.Clariidae"
                    value="{{$commodity->latin_name}}" disabled />
            </div>

            <div class="mb-5">
                <label class="form-label required">Cultivation Duration</label>

                <div class="input-group">
                    <input type="number" class="form-control form-control-solid" name="duration" id="duration"
                        placeholder="0" value="{{$commodity->duration}}" disabled>
                    <select class="input-group-text" name="duration_type" id="duration_type" disabled>
                        <option value="bulan">Month</option>
                        <option value="hari" selected>Day</option>
                    </select>
                </div>
            </div>

            <div class="mb-5">
                <label class="form-label">Selling Price Per Kilogram</label>

                <input type="text" class="form-control form-control-solid" name="selling_price"
                    id="selling_price" placeholder="Insert selling price" value="{{$commodity->selling_price}}" disabled>
                <div class="text-muted">
                    example : Rp 25.000
                </div>
            </div>

            <div class="mb-5">
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Temperature</label>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Water Ph</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="number" class="form-control form-control-solid" name="temp_bottom"
                                id="temp_bottom" placeholder="0" value="{{$temp[0]}}" disabled>
                            <span class="input-group-text">
                                °C
                            </span>
                            <span class="ms-5 pt-3">-</span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="number" class="form-control form-control-solid" name="temp_up"
                                id="temp_up" placeholder="0" value="{{$temp[1]}}" disabled>
                            <span class="input-group-text">
                                °C
                            </span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="number" class="form-control form-control-solid" name="ph_bottom"
                                id="ph_bottom" placeholder="0.0" value="{{$ph[0]}}" disabled>
                            <span class="ms-5 pt-3">-</span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <input type="number" class="form-control form-control-solid" name="ph_up" id="ph_up" placeholder="0.0" value="{{$ph[1]}}" disabled>
                    </div>
                </div>
            </div>

            <div class="mb-5">
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Water Height</label>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Water Type</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="number" class="form-control form-control-solid" name="water_height_bottom"
                                id="water_height_bottom" placeholder="0" value="{{$water_height[0]}}" disabled>
                            <span class="input-group-text">
                                cm
                            </span>
                            <span class="ms-5 pt-3">-</span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="number" class="form-control form-control-solid" name="water_height_up"
                                id="water_height_up" placeholder="0" value="{{$water_height[1]}}" disabled>
                            <span class="input-group-text">
                                cm
                            </span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control form-control-solid" name="water_type" id="water_type" placeholder="Cth. Air Tawar" value="{{$commodity->water_type}}" disabled>
                    </div>
                </div>
            </div>

            <div class="mb-5">
                <label class="form-label">Water Media Preparation</label>
                <textarea id="preparation_description" name="preparation_description" class="tox-target">{{{ $commodity->preparation_description }}}</textarea>
            </div>

            <div class="mb-5">
                <label class="form-label">Seed Spreading</label>
                <textarea id="seeding_description" name="seeding_description" class="tox-target">{{{ $commodity->seeding_description }}}</textarea>
            </div>

            <div class="mb-5">
                <label class="form-label">Cultivation Period</label>
                <textarea id="cutivation_description" name="cutivation_description" class="tox-target">{{{ $commodity->cutivation_description }}}</textarea>
            </div>

            <div class="footer d-flex justify-content-end py-10">
                <div class="d-flex justify-content-end">
                    <button id="cancelButton" type="button"
                        class="btn btn-light btn-active-light-primary me-3">Cancel</button>
                    <button id="update-commodity" type="submit" class="btn btn-active-primary btn-primary"
                        data-kt-indicator="off">
                        <span class="indicator-label">
                            Update
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
    // convert input selling price to rupiah
    $(document).ready(function(){
        var price = formatRupiah($('#selling_price').val(), 'Rp ');
        $('#selling_price').val(price);
    });
    convertRupiah('selling_price');

    // function for enable edit form
    const enableForm = () => {
        $('#edit').hide();
        $('#btn_edit_cover').show();
        $('#btn_cancel_cover').show();
        $('#btn_remove_cover').show();
        // $('#name').attr('disabled', false);
        // $('#latin_name').attr('disabled', false);
        // $('#duration').attr('disabled', false);
        // $('#duration_type').attr('disabled', false);
        $('#selling_price').attr('disabled', false);
        $('#temp_bottom').attr('disabled', false);
        $('#temp_up').attr('disabled', false);
        $('#ph_bottom').attr('disabled', false);
        $('#ph_up').attr('disabled', false);
        $('#water_height_bottom').attr('disabled', false);
        $('#water_height_up').attr('disabled', false);
        $('#water_type').attr('disabled', false);
        setTinyMce(KTThemeMode.getMode(), selector_tinymce, 0);
        $('#cancelButton').show();
        $('#update-commodity').show();
    }

    // function for disable edit form
    const disableForm = () => {
        $('#edit').show();
        $('#btn_edit_cover').hide();
        $('#btn_cancel_cover').hide();
        $('#btn_remove_cover').hide();
        $('#name').attr('disabled', true);
        $('#latin_name').attr('disabled', true);
        $('#duration').attr('disabled', true);
        $('#duration_type').attr('disabled', true);
        $('#selling_price').attr('disabled', true);
        $('#temp_bottom').attr('disabled', true);
        $('#temp_up').attr('disabled', true);
        $('#ph_bottom').attr('disabled', true);
        $('#ph_up').attr('disabled', true);
        $('#water_height_bottom').attr('disabled', true);
        $('#water_height_up').attr('disabled', true);
        $('#water_type').attr('disabled', true);
        setTinyMce(KTThemeMode.getMode(), selector_tinymce, 1);
        $('#cancelButton').hide();
        $('#update-commodity').hide();
    }

    // selector for tinymce and variable mode to know mode is enable form (0) or disable form (1)
    var selector_tinymce = "#preparation_description, #seeding_description, #cutivation_description";
    var mode = 1;

    $(document).ready(function(){
        disableForm();
    });

    $('#edit').on('click', function(){
        mode = 0;
        enableForm();
    });

    $('#cancelButton').on('click', function(){
        mode = 1;
        disableForm();
    });

    // change mode or theme tinymce
    $('a[data-kt-element="mode"]').on('click', function(){
        setTinyMce($(this).attr('data-kt-value'), selector_tinymce, mode);
    });
</script>
@endpush