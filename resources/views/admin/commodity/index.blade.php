@extends('layouts.app')
@section('title', 'Kelola Data Komoditas')
@section('page-title')
<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 w-100   ">
    <h1 class="page-heading d-flex text-dark fw-bold flex-column justify-content-center my-0">
        Kelola Komoditas
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
                        <a href="{{ route('commodity.index') }}" class="text-muted">Data Komoditas</a>
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
                <input type="search" name="search" class="form-control form-control-solid w-350px ps-15" id="search"
                    placeholder="Cari.." />
            </div>
        </div>
        {{-- @if (Auth::user()->role == 1)
        <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
            <a type="button" class="btn btn-active-primary btn-primary ms-2" href="{{route('commodity.create')}}" id="addButton">
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
        @endif --}}
    </div>
    <div class="card-body fs-6 text-gray-700">
        <table id="commodity-table" class="table align-middle table-row-dashed fs-6 gy-5">
            <thead>
                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                    <th><input class="form-check-input" type="checkbox" disabled></th>
                    <th>Nama Komoditas</th>
                    <th>Nama Latin</th>
                    <th>Durasi Budidaya</th>
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
    var datatable = $('#commodity-table').DataTable({
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
                    data: 'latin_name',
                    name: 'latin_name',
                    orderable: true,
                    searchable: true,
                    width: '15%'
                },
                {
                    data: 'duration',
                    name: 'duration',
                    orderable: true,
                    searchable: false,
                    width: '10%'
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
</script>
<script>
    $('#commodity-table').on("click", ".id-check", function(e) {
            var checked = $(this).is(":checked");
            if (checked) {
                $('#delete-confirm').removeClass('d-none');
                $('#addButton').addClass('d-none');
            } else {
                if ($('.id-check:checkbox:checked').length === 0) {
                    $('#delete-confirm').addClass('d-none');
                    $('#addButton').removeClass('d-none');
                }
            }
        });
</script>
<script>
    $(document).on("click", "#delete-confirm", function(e) {
            e.preventDefault();

            var commodity_id = [];
            $('.id-check:checkbox:checked').each(function(i, obj){
                commodity_id.push($(obj).val());
            });

            var title_modal = commodity_id.length + ' Komoditas Akan Dihapus';

            Swal.fire({
                customClass: {
                    confirmButton: 'btn btn-danger',
                    cancelButton: 'btn btn-light'
                },
                title: title_modal,
                text: "Apakah Anda yakin ingin menghapus komoditas yang diseleksi? Data yang telah terhapus tidak dapat dipulihkan.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Hapus',
            }).then((result) => {
                if (result.isConfirmed) {
                    e.preventDefault();
                    
                    var route = "{{ route('commodity.delete') }}";
                    $.ajax({
                        url: route,
                        type: 'POST',
                        data: {
                            _token: $("meta[name='csrf-token']").attr("content"),
                            commodity_id: commodity_id
                        },
                        success: function(response) {
                            Swal.fire({
                                customClass: {
                                    confirmButton: 'btn btn-success',
                                },
                                title: 'Komoditas telah Dihapus',
                                text: 'Komoditas yang diseleksi berhasil dihapus',
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