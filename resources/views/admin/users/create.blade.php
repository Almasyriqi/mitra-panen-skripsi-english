@extends('layouts.app')
@section('title', 'Create User')
@section('page-title')
<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 w-100   ">
    <h1 class="page-heading d-flex text-dark fw-bold flex-column justify-content-center my-0">
        Create User
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
                        <a href="{{ route('user.index') }}" class="text-muted">Manage Users &nbsp;</a>
                    </li>
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('user.create') }}" class="text-muted">Create User &nbsp;</a>
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
    <form action="{{route('user.store')}}" method="post" enctype="multipart/form-data">
        @csrf
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
                <Label class="form-label required fs-6 fw-bold mt-2 mb-3">Profile picture</Label>
                <div class="input-group">
                    <input type="file" accept=".jpg, .jpeg, .png" title="Choose Picture" class="form-control"
                        name="avatar" id="avatar" required />
                </div>
            </div>

            <div class="mb-5">
                <Label class="form-label required fs-6 fw-bold mt-2 mb-3">User Name</Label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Insert User Name"
                    value="{{old('name')}}" required>
            </div>

            <div class="mb-5">
                <div class="row">
                    <div class="col-md-4">
                        <Label class="form-label required fs-6 fw-bold mt-2 mb-3">Email</Label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-envelope-at" viewBox="0 0 16 16">
                                    <path
                                        d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2H2Zm3.708 6.208L1 11.105V5.383l4.708 2.825ZM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2-7-4.2Z" />
                                    <path
                                        d="M14.247 14.269c1.01 0 1.587-.857 1.587-2.025v-.21C15.834 10.43 14.64 9 12.52 9h-.035C10.42 9 9 10.36 9 12.432v.214C9 14.82 10.438 16 12.358 16h.044c.594 0 1.018-.074 1.237-.175v-.73c-.245.11-.673.18-1.18.18h-.044c-1.334 0-2.571-.788-2.571-2.655v-.157c0-1.657 1.058-2.724 2.64-2.724h.04c1.535 0 2.484 1.05 2.484 2.326v.118c0 .975-.324 1.39-.639 1.39-.232 0-.41-.148-.41-.42v-2.19h-.906v.569h-.03c-.084-.298-.368-.63-.954-.63-.778 0-1.259.555-1.259 1.4v.528c0 .892.49 1.434 1.26 1.434.471 0 .896-.227 1.014-.643h.043c.118.42.617.648 1.12.648Zm-2.453-1.588v-.227c0-.546.227-.791.573-.791.297 0 .572.192.572.708v.367c0 .573-.253.744-.564.744-.354 0-.581-.215-.581-.8Z" />
                                </svg>
                            </span>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Insert email"
                                required aria-describedby="basic-addon3" value="{{old('email')}}"/>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <Label class="form-label required fs-6 fw-bold mt-2 mb-3">Phonenumber</Label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-whatsapp" viewBox="0 0 16 16">
                                    <path
                                        d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
                                </svg>
                            </span>
                            <input type="text" class="form-control" name="phone_number" id="phone_number"
                                placeholder="Insert phonenumber" value="{{old('phone_number')}}" required>
                        </div>
                        <!--begin::Hint-->
                        <div class="text-muted">
                            example : +6282233445566
                        </div>
                        <!--end::Hint-->
                    </div>
                    <div class="col-md-4">
                        <Label class="form-label required fs-6 fw-bold mt-2 mb-3">Role</Label>
                        <select name="role" id="role" class="form-control" required>
                            <option value="" selected disabled>Choose role</option>
                            <option value="1">Admin</option>
                            <option value="2">Mitra</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="mb-5">
                <div class="row">
                    <div class="col-md-6">
                        <!--begin::Main wrapper-->
                        <div class="fv-row" data-kt-password-meter="true">
                            <!--begin::Wrapper-->
                            <div class="mb-1">
                                <!--begin::Label-->
                                <label class="form-label required fw-semibold fs-6 mb-2">
                                    Password
                                </label>
                                <!--end::Label-->

                                <!--begin::Input wrapper-->
                                <div class="position-relative mb-3">
                                    <input class="form-control form-control-lg form-control-solid" type="password"
                                        placeholder="Insert password" name="password" autocomplete="off" required />

                                    <!--begin::Visibility toggle-->
                                    <span
                                        class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                        data-kt-password-meter-control="visibility">
                                        <i class="bi bi-eye-slash fs-2"></i>

                                        <i class="bi bi-eye fs-2 d-none"></i>
                                    </span>
                                    <!--end::Visibility toggle-->
                                </div>
                                <!--end::Input wrapper-->

                                <!--begin::Highlight meter-->
                                <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                                </div>
                                <!--end::Highlight meter-->
                            </div>
                            <!--end::Wrapper-->

                            <!--begin::Hint-->
                            <div class="text-muted">
                                Use 8 or more characters with a mix of letters, numbers & symbols.
                            </div>
                            <!--end::Hint-->
                        </div>
                        <!--end::Main wrapper-->
                    </div>
                    <div class="col-md-6">
                        <!--begin::Main wrapper-->
                        <div class="fv-row" data-kt-password-meter="true">
                            <!--begin::Wrapper-->
                            <div class="mb-1">
                                <!--begin::Label-->
                                <label class="form-label required fw-semibold fs-6 mb-2">
                                    Confirm Password
                                </label>
                                <!--end::Label-->

                                <!--begin::Input wrapper-->
                                <div class="position-relative mb-3">
                                    <input class="form-control form-control-lg form-control-solid" type="password"
                                        placeholder="Insert confirm password" name="password_confirmation"
                                        autocomplete="off" required />

                                    <!--begin::Visibility toggle-->
                                    <span
                                        class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                        data-kt-password-meter-control="visibility">
                                        <i class="bi bi-eye-slash fs-2"></i>

                                        <i class="bi bi-eye fs-2 d-none"></i>
                                    </span>
                                    <!--end::Visibility toggle-->
                                </div>
                                <!--end::Input wrapper-->

                                <!--begin::Highlight meter-->
                                <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                                </div>
                                <!--end::Highlight meter-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Main wrapper-->
                    </div>
                </div>
            </div>

            <div class="footer d-flex justify-content-end py-10">
                <div class="d-flex justify-content-end">
                    <a href="{{route('user.index')}}" id="cancelButton" class="btn btn-light btn-active-light-primary me-3">Batalkan</a>
                    <button id="save-user" type="submit" class="btn btn-active-primary btn-primary"
                        data-kt-indicator="off">
                        <span class="indicator-label">
                            Create
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
    Inputmask({
            "mask" : "+9999999999999",
        }).mask("#phone_number");
</script>
@endpush