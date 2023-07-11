@extends('layouts.app')
@section('title', 'Implementasi Model')
@section('page-title')
<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 w-100   ">
    <h1 class="page-heading d-flex text-dark fw-bold flex-column justify-content-center my-0">
        Implementasi Model
    </h1>
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap p-0">
        <!--begin::Info-->
        <div class="d-flex align-items-center flex-wrap mr-1">
            <!--begin::Page Heading-->
            <div class="d-flex align-items-baseline flex-wrap mr-5">
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item text-muted">
                        <a href="" class="text-muted">Model Regresi &nbsp;</a>
                    </li>
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('learning.model.train') }}" class="text-muted">Implementasi Model &nbsp;</a>
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
    <div class="card-header align-items-center gap-md-5 collapsible cursor-pointer rotate" data-bs-toggle="collapse"
        data-bs-target="#content_train">
        <div class="card-title">
            <h2>Data Train</h2>
            <hr>
        </div>
        <div class="card-toolbar rotate-180">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                class="bi bi-chevron-down" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
            </svg>
        </div>
    </div>
    <div id="content_train" class="collapse show">
        <div class="card-body fs-6 text-gray-700 pt-0">
            <table id="train-table" class="table align-middle table-row-dashed fs-6 gy-5">
                <thead>
                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                        <th>Fish Id</th>
                        <th>Jumlah Bibit</th>
                        <th>Berat Bibit</th>
                        <th>Survival Rate</th>
                        <th>Rata-Rata Berat Ikan (gram/ekor)</th>
                        <th>Volume Kolam (m<sup>3</sup>)</th>
                        <th>Total Pakan (kg)</th>
                        <th>Hasil Panen</th>
                    </tr>
                </thead>
                <tbody class="fw-semibold fs-7 text-gray-600">
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="card card-flush mt-5">
    <div class="card-header align-items-center gap-md-5 collapsible cursor-pointer rotate" data-bs-toggle="collapse"
        data-bs-target="#content_result_test">
        <div class="card-title">
            <h2>Hasil Pengujian</h2>
            <hr>
        </div>
        <div class="card-toolbar rotate-180">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                class="bi bi-chevron-down" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
            </svg>
        </div>
    </div>
    <div id="content_result_test" class="collapse show">
        <div class="card-body fs-6 text-gray-700 pt-0">
            <p>Berikut ini merupakan tabel hasil pengujian nilai rata-rata RMSE dan MAPE terbaik setiap metode terhadap
                persentase data uji
                yang dapat digunakan sebagai acuan dalam memilih metode yang dipilih untuk implementasi model
                machine learning pada sistem.</p>
            <p>Untuk nilai RMSE semakin rendah semakin baik, jika nilai mendekati 0 maka hasil prediksi sangat akurat
                dan mendekati nilai aktual.
                Untuk nilai MAPE akan disajikan tabel rentang nilai yang berada di bawah tabel hasil pengujian.
            </p>
            <table class="table align-middle table-row-dashed fs-6 gy-5">
                <thead>
                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                        <th>Metode</th>
                        <th>Rata-Rata RMSE</th>
                        <th>Rata-Rata MAPE</th>
                    </tr>
                </thead>
                <tbody class="fw-semibold fs-7 text-gray-600">
                    <tr>
                        <td>Linear Regression</td>
                        <td>38.39</td>
                        <td>9.18%</td>
                    </tr>
                    <tr>
                        <td>Polynomial Regression</td>
                        <td>4.39</td>
                        <td>0.41%</td>
                    </tr>
                    <tr>
                        <td>Random Forest Regression</td>
                        <td>25.94</td>
                        <td>3.16%</td>
                    </tr>
                    <tr>
                        <td>Support Vector Regression</td>
                        <td>9.97</td>
                        <td>1.18%</td>
                    </tr>
                </tbody>
            </table>

            <hr>
            <h4 class="mt-5">Tabel Rentang Nilai MAPE</h4>
            <table class="table align-middle table-row-dashed fs-6 gy-5">
                <thead>
                    <tr>
                        <th>Range MAPE</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>< 10%</td>
                        <td>Kemampuan Model Prediksi Sangat Baik</td>
                    </tr>
                    <tr>
                        <td>10 - 20%</td>
                        <td>Kemampuan Model Prediksi Baik</td>
                    </tr>
                    <tr>
                        <td>20 - 50%</td>
                        <td>Kemampuan Model Prediksi Layak</td>
                    </tr>
                    <tr>
                        <td>> 50%</td>
                        <td>Kemampuan Model Prediksi Buruk</td>
                    </tr>
                </tbody>
            </table>
            Sumber: (Fachid & Triayudi, 2022)
        </div>
    </div>
</div>
<div class="card card-flush mt-5">
    <div class="card-header">
        <div class="card-title">
            <h2>Train Regression Model</h2>
        </div>
    </div>

    <div class="card-body pt-0">
        <Label class="form-label required fs-6 fw-bold mt-2 mb-3">Metode</Label>
        <select class="form-select" data-control="select2" data-placeholder="Pilih metode yang digunakan" name="method"
            id="method">
            <option></option>
            <option value="linear">Linear Regression</option>
            <option value="poly">Polynomial Regression</option>
            <option value="rf">Random Forest Regression</option>
            <option value="svr">Support Vector Regression</option>
        </select>
    </div>

    <div class="card-footer pt-0">
        <button class="btn btn-primary" id="train_btn" disabled>
            <span class="indicator-label">
                Train Model
            </span>
            <span class="indicator-progress">
                Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
            </span>
        </button>
    </div>
</div>
@endsection
@push('scripts')
<script>
    var datatable = $('#train-table').DataTable({
            processing: true,
            serverSide: true,
            ordering: false,
            stateSave: false,
            ajax: {
                url: '{!! url()->current() !!}',
            },
            columns: [{
                    data: 'fish_type_id',
                    name: 'fish_type_id',
                    orderable: false,
                    searchable: false,
                    width: '10%'
                },
                {
                    data: 'seed_amount',
                    name: 'seed_amount',
                    orderable: false,
                    searchable: false,
                    width: '10%',
                },
                {
                    data: 'seed_weight',
                    name: 'seed_weight',
                    orderable: false,
                    searchable: false,
                    width: '10%'
                },
                {
                    data: 'survival_rate',
                    name: 'survival_rate',
                    orderable: false,
                    searchable: false,
                    width: '10%'
                },
                {
                    data: 'average_weight',
                    name: 'average_weight',
                    orderable: false,
                    searchable: false,
                    width: '10%'
                },
                {
                    data: 'pond_volume',
                    name: 'pond_volume',
                    orderable: false,
                    searchable: false,
                    width: '15%'
                },
                {
                    data: 'total_feed_spent',
                    name: 'total_feed_spent',
                    orderable: false,
                    searchable: false,
                    width: '10%'
                },
                {
                    data: 'harvest_amount',
                    name: 'harvest_amount',
                    orderable: false,
                    searchable: false,
                    width: '10%'
                },
            ],
            scrollX: true,
        });
</script>
<script>
    $('#method').on('change', function(){
        $('#train_btn').removeAttr('disabled');
    });

    $('#train_btn').on('click', function(e){
        e.preventDefault();
        var method = $('#method').val();
        $(this).attr("data-kt-indicator", "on");

        var route = "{{config('app.api_python_url')}}";
        route = route + "/training/full";
        $.ajax({
            url: route,
            type: 'GET',
            data: {
                method: method
            },
            success: function(response) {
                $('#train_btn').removeAttr('data-kt-indicator');
                Swal.fire({
                    customClass: {
                        confirmButton: 'btn btn-success',
                    },
                    title: 'Berhasil training regression model',
                    text: 'berhasil',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            },
            error: function(xhr, textStatus, error) {
                $('#train_btn').removeAttr('data-kt-indicator');
                if (textStatus === "error" && error === "") {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Terjadi kesalahan pada API Python Regression Model, pastikan API sudah berjalan pada server!',
                    });
                } else {
                    var json = JSON.parse(xhr.responseText);
                    Swal.fire({
                        customClass: {
                            confirmButton: 'btn btn-success',
                        },
                        title: 'Error',
                        text: json.error,
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            }
        });
    });
</script>
@endpush