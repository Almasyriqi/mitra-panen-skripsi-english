@extends('layouts.app')
@section('title', 'Kelola Data User')
@section('page-title')
<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 w-100   ">
    <h1 class="page-heading d-flex text-dark fw-bold flex-column justify-content-center my-0">
        Kelola User
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
                        <a href="{{ route('user.index') }}" class="text-muted">Kelola User &nbsp;</a>
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
    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
        <div class="card-title">
            <div class="d-flex align-items-center position-relative my-1">
                <span class="svg-icon svg-icon-1 position-absolute ms-4">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                            transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                        <path
                            d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                            fill="currentColor" />
                    </svg>
                </span>
                <input type="search" name="search" class="form-control form-control-solid w-250px ps-15" id="search"
                    placeholder="Cari.." />
            </div>
        </div>
        <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
            <button type="button" class="btn btn-active-primary btn-light ms-2" href="" id="filterButton"
                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start" data-kt-menu-offset="30px, 30px">
                <span class="svg-icon svg-icon-5 svg-icon-gray-500 me-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path
                            d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z"
                            fill="currentColor">
                        </path>
                    </svg>
                </span>
                Filter
            </button>
            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px"
                data-kt-menu="true">
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">Pilihan Filter</div>
                </div>
                <!--end::Menu item-->

                <!--begin::Menu separator-->
                <div class="separator mb-3 opacity-75"></div>
                <!--end::Menu separator-->

                <!--begin::Menu item-->
                <div class="menu-item px-3 mb-3">
                    Jenis Akun
                </div>
                <div class="menu-item px-3 mb-2">
                    <div class="form-check form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" name="filter_semua" checked id="filter_semua"/>
                        <label class="form-check-label" for="flexCheckDefault">
                            Semua
                        </label>
                    </div>
                </div>
                <div class="menu-item px-3 mb-2">
                    <div class="form-check form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" name="filter_admin" checked id="filter_admin"/>
                        <label class="form-check-label" for="flexCheckDefault">
                            Admin
                        </label>
                    </div>
                </div>
                <div class="menu-item px-3 mb-2">
                    <div class="form-check form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" name="filter_mitra" checked id="filter_mitra"/>
                        <label class="form-check-label" for="flexCheckDefault">
                            Mitra Panen
                        </label>
                    </div>
                </div>
                <!--end::Menu item-->

            </div>
            <a type="button" class="btn btn-active-primary btn-primary ms-2" href="{{route('user.create')}}" id="addButton">
                <span class="svg-icon svg-icon-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1"
                            transform="rotate(-90 11.364 20.364)" fill="currentColor"></rect>
                        <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor"></rect>
                    </svg>
                </span>
                Tambah
            </a>
            <a type="button" class="btn btn-danger ms-2 d-none" id="delete-confirm">
                <span class="svg-icon svg-icon-3">
                    <svg width="18" height="20" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M3.16667 6.66699V15.0003C3.16667 16.8413 4.65905 18.3337 6.5 18.3337H11.5C13.3409 18.3337 14.8333 16.8413 14.8333 15.0003V6.66699M10.6667 9.16699V14.167M7.33333 9.16699L7.33333 14.167M12.3333 4.16699L11.1614 2.40916C10.8523 1.94549 10.3319 1.66699 9.77469 1.66699H8.22531C7.66805 1.66699 7.14767 1.94549 6.83856 2.40916L5.66667 4.16699M12.3333 4.16699H5.66667M12.3333 4.16699H16.5M5.66667 4.16699H1.5"
                            stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </span>
                Hapus
            </a>

        </div>
    </div>
    <div class="card-body fs-6 text-gray-700">
        <table id="user-table" class="table align-middle table-row-dashed fs-6 gy-5">
            <thead>
                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                    <th><input class="form-check-input" type="checkbox" disabled></th>
                    <th>Nama User</th>
                    <th>Tanggal Bergabung</th>
                    <th>Role</th>
                    <th>No HP</th>
                    <th>Jumlah Kolam</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="fw-semibold fs-7 text-gray-600">
            </tbody>
        </table>
    </div>
</div>
@endsection
@push('scripts')
<script>
    var datatable = $('#user-table').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            stateSave: false,
            ajax: {
                url: '{!! url()->current() !!}',
            },
            columns: [{
                    data: 'checkbox',
                    name: 'checkbox',
                    orderable: false,
                    searchable: false,
                    width: '5%'
                },
                {
                    data: 'name',
                    name: 'name',
                    orderable: true,
                    searchable: true,
                    width: '20%',
                },
                {
                    data: 'joinedSince',
                    name: 'joinedSince',
                    orderable: true,
                    searchable: true,
                    width: '15%'
                },
                {
                    data: 'role',
                    name: 'role',
                    orderable: true,
                    searchable: false,
                    width: '10%'
                },
                {
                    data: 'phonenumber',
                    name: 'phonenumber',
                    orderable: false,
                    searchable: false,
                    width: '15%'
                },
                {
                    data: 'pondsAmount',
                    name: 'pondsAmount',
                    orderable: true,
                    searchable: false,
                    width: '15%'
                },
                {
                    data: 'actions',
                    name: 'actions',
                    orderable: false,
                    searchable: false,
                    width: '10%'
                },
            ],
            order: [
                [1, "desc"]
            ],
            scrollX: true,
            columnDefs: [{
                targets: 'nosort',
                orderable: false,
            }],
        });

        // search data in datatable
        $('#search').on('keyup', function() {
            datatable.search(this.value).draw();
        });

        var filter_user = 'all';
        // on change filter_semua checkbox
        $('#filter_semua').on('change', function(){
            if($('#filter_semua').is(':checked')){
                $('#filter_admin').prop('checked', true);
                $('#filter_mitra').prop('checked', true);
                filter_user = 'all';
            } else {
                $('#filter_admin').prop('checked', false);
                $('#filter_mitra').prop('checked', false);
                filter_user = null;
            }
            datatable.ajax.url('{{ route('user.index') }}?filter=' + filter_user).load();
            datatable.ajax.reload();
        });

        // on change filter admin and mitra checkbox
        $('#filter_admin, #filter_mitra').on('change', function(){
            if($('#filter_admin').is(':checked') == false || $('#filter_mitra').is(':checked') == false){
                $('#filter_semua').prop('checked', false);
            }

            if($('#filter_admin').is(':checked') && $('#filter_mitra').is(':checked')){
                filter_user = 'all';
            } else if($('#filter_admin').is(':checked')){
                filter_user = 'admin';
            } else if($('#filter_mitra').is(':checked')){
                filter_user = 'mitra';
            } else {
                filter_user = null;
            }
            datatable.ajax.url('{{ route('user.index') }}?filter=' + filter_user).load();
            datatable.ajax.reload();
        });
</script>
<script>
    $('#user-table').on("click", ".id-check", function(e) {
            var checked = $(this).is(":checked");
            if (checked) {
                $('#delete-confirm').removeClass('d-none');
                $('#addButton, #filterButton').addClass('d-none');
            } else {
                if ($('.id-check:checkbox:checked').length === 0) {
                    $('#delete-confirm').addClass('d-none');
                    $('#addButton, #filterButton').removeClass('d-none');
                }
            }
        });
</script>
<script>
    $(document).on("click", "#delete-confirm", function(e) {
            e.preventDefault();

            var user_id = [];
            $('.id-check:checkbox:checked').each(function(i, obj){
                user_id.push($(obj).val());
            });

            var title_modal = user_id.length + ' User Akan Dihapus';

            Swal.fire({
                customClass: {
                    confirmButton: 'btn btn-danger',
                    cancelButton: 'btn btn-light'
                },
                title: title_modal,
                text: "Apakah Anda yakin ingin menghapus user yang diseleksi? Data yang telah terhapus tidak dapat dipulihkan.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Hapus',
            }).then((result) => {
                if (result.isConfirmed) {
                    e.preventDefault();
                    
                    var route = "{{ route('user.delete') }}";
                    $.ajax({
                        url: route,
                        type: 'POST',
                        data: {
                            _token: $("meta[name='csrf-token']").attr("content"),
                            user_id: user_id
                        },
                        success: function(response) {
                            Swal.fire({
                                customClass: {
                                    confirmButton: 'btn btn-success',
                                },
                                title: 'User telah Dihapus',
                                text: 'User yang diseleksi berhasil dihapus',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then((hasil) => {
                                location.reload();
                            })
                        },
                        error: function(xhr) {
                            var json = JSON.parse(xhr.responseText);
                            Swal.fire({
                                customClass: {
                                    confirmButton: 'btn btn-success',
                                },
                                title: 'Error',
                                text: json.error,
                                icon: 'error',
                                confirmButtonText: 'OK'
                            })
                        }
                    });
                }
            })
        });
</script>
@endpush