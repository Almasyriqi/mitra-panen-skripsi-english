@extends('layouts.app')
@section('title', 'Model Testing')
@section('page-title')
<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 w-100   ">
    <h1 class="page-heading d-flex text-dark fw-bold flex-column justify-content-center my-0">
        Model Testing
    </h1>
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap p-0">
        <!--begin::Info-->
        <div class="d-flex align-items-center flex-wrap mr-1">
            <!--begin::Page Heading-->
            <div class="d-flex align-items-baseline flex-wrap mr-5">
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item text-muted">
                        <a href="" class="text-muted">Regression Model &nbsp;</a>
                    </li>
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('learning.model.test') }}" class="text-muted">Model Testing &nbsp;</a>
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
    <div class="card-header">
        <div class="card-title">
            <h2>Test Regression Model</h2>
        </div>
    </div>

    <div class="card-body pt-0">
        <div class="mb-5">
            <Label class="form-label required fs-6 fw-bold mt-2 mb-3">Percentage of total test data</Label>
            <select class="form-select" data-control="select2"
                data-placeholder="Select the percentage of test data used" name="test_size" id="test_size">
                <option></option>
                <option value="0.05">5%</option>
                <option value="0.1">10%</option>
                <option value="0.15">15%</option>
                <option value="0.2">20%</option>
                <option value="0.25">25%</option>
                <option value="0.3">30%</option>
                <option value="0.35">35%</option>
                <option value="0.4">40%</option>
                <option value="0.45">45%</option>
                <option value="0.5">50%</option>
                <option value="0.55">55%</option>
                <option value="0.6">60%</option>
                <option value="0.65">65%</option>
                <option value="0.7">70%</option>
                <option value="0.75">75%</option>
                <option value="0.8">80%</option>
                <option value="0.85">85%</option>
                <option value="0.9">90%</option>
                <option value="0.95">95%</option>
            </select>
        </div>

        <div class="mb-5">
            <Label class="form-label required fs-6 fw-bold mt-2 mb-3">Setting Hyperparameter Regression Model</Label>
            <select class="form-select" data-control="select2" name="setting" id="setting">
                <option value="default">Default</option>
                <option value="best">Best Parameter</option>
            </select>
        </div>
    </div>

    <div class="card-footer pt-0">
        <button class="btn btn-primary" id="test_btn" disabled>
            <span class="indicator-label">
                Test Model
            </span>
            <span class="indicator-progress">
                Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
            </span>
        </button>
    </div>
</div>

<div class="card card-flush mt-5" id="data_train_section">
    <div class="card-header align-items-center gap-md-5 collapsible cursor-pointer rotate" data-bs-toggle="collapse"
        data-bs-target="#content_train">
        <div class="card-title">
            <h2>Data Train</h2>
            <hr>
        </div>
        <div class="card-toolbar rotate-180">
            <span class="indicator-label">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                  </svg>
            </span>
            <span class="indicator-progress">
                <span class="spinner-border spinner-border-lg align-middle ms-2"></span>
            </span>
        </div>
    </div>
    <div id="content_train" class="collapse show">
        <div class="card-body fs-6 text-gray-700 pt-0">
            <table id="train-table" class="table align-middle table-row-dashed fs-6 gy-5">
                <thead>
                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                        <th>Fish Id</th>
                        <th>Seedling Count</th>
                        <th>Seedling Weight</th>
                        <th>Survival Rate (%)</th>
                        <th>Average Fish Weight (grams/tail)</th>
                        <th>Pond Volume</th>
                        <th>Total Feed Spent (kg)</th>
                        <th>Harvest Yield</th>
                    </tr>
                </thead>
                <tbody class="fw-semibold fs-7 text-gray-600">
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="card card-flush mt-5" id="data_test_section">
    <div class="card-header align-items-center gap-md-5 collapsible cursor-pointer rotate" data-bs-toggle="collapse"
        data-bs-target="#content_test">
        <div class="card-title">
            <h2>Data Test</h2>
            <hr>
        </div>
        <div class="card-toolbar rotate-180">
            <span class="indicator-label">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                  </svg>
            </span>
            <span class="indicator-progress">
                <span class="spinner-border spinner-border-lg align-middle ms-2"></span>
            </span>
        </div>
    </div>
    <div id="content_test" class="collapse show">
        <div class="card-body fs-6 text-gray-700 pt-0">
            <table id="test-table" class="table align-middle table-row-dashed fs-6 gy-5">
                <thead>
                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                        <th>Fish Id</th>
                        <th>Seedling Count</th>
                        <th>Seedling Weight</th>
                        <th>Survival Rate (%)</th>
                        <th>Average Fish Weight (grams/tail)</th>
                        <th>Pond Volume</th>
                        <th>Total Feed Spent (kg)</th>
                        <th>Harvest Yield</th>
                    </tr>
                </thead>
                <tbody class="fw-semibold fs-7 text-gray-600">
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="card card-flush mt-5" id="data_compare_section">
    <div class="card-header align-items-center gap-md-5 collapsible cursor-pointer rotate" data-bs-toggle="collapse"
        data-bs-target="#content_compare">
        <div class="card-title">
            <h2>Comparison of Prediction Results</h2><br>
        </div>
        <div class="card-toolbar rotate-180">
            <span class="indicator-label">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                  </svg>
            </span>
            <span class="indicator-progress">
                <span class="spinner-border spinner-border-lg align-middle ms-2"></span>
            </span>
        </div>
    </div>
    <div id="content_compare" class="collapse show">
        <div class="card-body fs-6 text-gray-700 pt-0">
            <p>Comparison of y_test values or actual data with predicted results using the regression model.</p>
            <table id="compare-table" class="table align-middle table-row-dashed fs-6 gy-5">
                <thead>
                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                        <th>Actual</th>
                        <th>Linear Regression</th>
                        <th>Polynomial Regression</th>
                        <th>Random Forest Regression</th>
                        <th>Support Vector Regression</th>
                    </tr>
                </thead>
                <tbody class="fw-semibold fs-7 text-gray-600">
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="card card-flush mt-5" id="graph_section">
    <div class="card-header align-items-center gap-md-5 collapsible cursor-pointer rotate" data-bs-toggle="collapse"
        data-bs-target="#content_graph">
        <div class="card-title">
            <h2>Comparison Chart of Actual and Predicted Values</h2><br>
        </div>
        <div class="card-toolbar rotate-180">
            <span class="indicator-label">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                  </svg>
            </span>
            <span class="indicator-progress">
                <span class="spinner-border spinner-border-lg align-middle ms-2"></span>
            </span>
        </div>
    </div>

    <div id="content_graph" class="collapse show">
        <div class="card-body">
            <div id="graph" style="height: 350px;"></div>
        </div>
    </div>
</div>

<div class="card card-flush mt-5" id="test_result_section">
    <div class="card-header align-items-center gap-md-5 collapsible cursor-pointer rotate" data-bs-toggle="collapse"
        data-bs-target="#content_result">
        <div class="card-title">
            <h2>Model Accuracy Testing</h2>
            <hr>
        </div>
        <div class="card-toolbar rotate-180">
            <span class="indicator-label">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                  </svg>
            </span>
            <span class="indicator-progress">
                <span class="spinner-border spinner-border-lg align-middle ms-2"></span>
            </span>
        </div>
    </div>
    <div id="content_result" class="collapse show">
        <div class="card-body fs-6 text-gray-700 pt-0">
            <p>Testing the accuracy of the regression model using RMSE (Root Mean Square Error) and MAPE (Mean Absolute
                Percentage Error).</p>
            <table id="result-table" class="table align-middle table-row-dashed fs-6 gy-5">
                <thead>
                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                        <th>Method</th>
                        <th>RMSE</th>
                        <th>MAPE</th>
                    </tr>
                </thead>
                <tbody class="fw-semibold fs-7 text-gray-600">
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    // attribute for graph
    var element = document.getElementById('graph');
    var height = parseInt(KTUtil.css(element, 'height'));
    var labelColor = KTUtil.getCssVariableValue('--kt-gray-500');
    var borderColor = KTUtil.getCssVariableValue('--kt-gray-200');
    var baseColor = KTUtil.getCssVariableValue('--kt-primary');
    var lightColor = KTUtil.getCssVariableValue('--kt-primary-light');
    var green = KTUtil.getCssVariableValue('--kt-success');
    var infoColor = KTUtil.getCssVariableValue('--kt-info');
    var yellow = KTUtil.getCssVariableValue('--kt-warning');
    var red = KTUtil.getCssVariableValue('--kt-danger');

    // function get color mode
    const getColorMode = (mode) => {
        var color = 'black';
        if (mode == 'dark') {
            color = 'white';
        } else {
            color = 'black';
        }
        return color;
    }

    // function get option graph
    const getOptions = (actual_data, linear_data, poly_data, rf_data, svr_data, color) => {
        var options = {
            series: [{
                    name: 'Actual Data',
                    data: actual_data
                },
                {
                    name: 'Linear Regression',
                    data: linear_data
                },
                {
                    name: 'Polynomial Regression',
                    data: poly_data
                },
                {
                    name: 'Random Forest Regression',
                    data: rf_data
                },
                {
                    name: 'SVR',
                    data: svr_data
                },
            ],
            chart: {
                type: 'area',
                stacked: false,
                height: 350,
                zoom: {
                    type: 'x',
                    enabled: true,
                    autoScaleYaxis: true
                },
                toolbar: {
                    autoSelected: 'zoom'
                }
            },
            legend: {
                show: true,
                position: 'top',
                labels: {
                    colors: color,
                },
                itemMargin: {
                    horizontal: 5,
                    vertical: 10
                },
            },
            dataLabels: {
                enabled: false
            },
            markers: {
                size: 0,
            },
            fill: {
                type: 'solid',
                opacity: 0
            },
            stroke: {
                curve: 'smooth',
                show: true,
                width: 3,
                colors: [baseColor, green, infoColor, yellow, red]
            },
            xaxis: {
                tickAmount: 20,
                labels: {
                    style: {
                        colors: color,
                        fontSize: '12px',
                        fontFamily: 'Helvetica, Arial, sans-serif',
                        fontWeight: 400,
                        cssClass: 'apexcharts-xaxis-label',
                    },
                },
                title: {
                    text: 'Data Point',
                    style: {
                        color: color,
                        fontSize: '12px',
                        fontFamily: 'Helvetica, Arial, sans-serif',
                        fontWeight: 600,
                        cssClass: 'apexcharts-yaxis-title',
                    },
                },
            },
            yaxis: {
                labels: {
                    formatter: function (val) {
                        return (val).toFixed(0);
                    },
                    style: {
                        colors: color,
                        fontSize: '12px',
                        fontFamily: 'Helvetica, Arial, sans-serif',
                        fontWeight: 400,
                        cssClass: 'apexcharts-yaxis-label',
                    },
                },
                title: {
                    text: 'Harvest Yield (Kg)',
                    style: {
                        color: color,
                        fontSize: '12px',
                        fontFamily: 'Helvetica, Arial, sans-serif',
                        fontWeight: 600,
                        cssClass: 'apexcharts-yaxis-title',
                    },
                },
            },
            tooltip: {
                shared: false,
                y: {
                    formatter: function (val) {
                    return (val).toFixed(0)
                    }
                }
            },
            colors: [lightColor, green, infoColor, yellow, red],
            grid: {
                borderColor: borderColor,
                strokeDashArray: 4,
                yaxis: {
                    lines: {
                        show: true
                    }
                }
            },
            markers: {
                strokeColor: baseColor,
                strokeWidth: 3
            },
            noData: {
                text: 'Loading...'
            }
        };
        return options;
    }

    var chart = new ApexCharts(element, getOptions([],[],[],[],[], getColorMode(KTThemeMode.getMode())));
    chart.render();

    // function get data graph
    const getGraphData = (color) => {
        var url = "{{config('app.api_python_url')}}";
        url = url + "/testing/model";
        $.getJSON(url, function(response) {
            chart.updateOptions(getOptions(response.actual_graph, response.linear_graph, response.poly_graph, response.rf_graph, response.svr_graph, color));
            $('.apexcharts-menu-item').css({ color: "black" });
        });
    }

    // change mode 
    $('a[data-kt-element="mode"]').on('click', function () {
        getGraphData(getColorMode($(this).attr('data-kt-value')));
    });

    $('#graph').on('click', function () {
        $('.apexcharts-menu-item').css({ color: "black" });
    });

    // hide section and get graph data before click button test
    $(document).ready(function(){
        $('#data_train_section').hide();
        $('#data_test_section').hide();
        $('#data_compare_section').hide();
        $('#graph_section').hide();
        $('#test_result_section').hide();
        var mode = KTThemeMode.getMode();
        getGraphData(getColorMode(mode));
    });

    // error handle when API Python not work
    $(document).ajaxError(function(event, jqxhr, settings, thrownError) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'An error occurred in the Python Regression Model API, make sure the API is running on the server!',
        });
    });

    $('#test_size').on('change', function(){
        $('#test_btn').removeAttr('disabled');
    });

    // setup datatable data train
    var route_train = "{{config('app.api_python_url')}}";
    route_train = route_train + "/testing/model";
    var datatable_train = $('#train-table').DataTable({
            ajax: {
                url: route_train,
                dataSrc: "data_train",
                beforeSend: function() {
                    $(".card-toolbar").attr("data-kt-indicator", "on"); // Tampilkan elemen loading
                },
                complete: function() {
                    $('.card-toolbar').removeAttr('data-kt-indicator'); // Sembunyikan elemen loading setelah permintaan selesai
                }
            },
            dom: 'Brtip',
            buttons: [
                'csv', 'excel', 'print'
            ],
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

    // setup datatable data test
    var route_test = "{{config('app.api_python_url')}}";
    route_test = route_test + "/testing/model";
    var datatable_test = $('#test-table').DataTable({
            ajax: {
                url: route_test,
                dataSrc: "data_test",
                beforeSend: function() {
                    $(".card-toolbar").attr("data-kt-indicator", "on"); // Tampilkan elemen loading
                },
                complete: function() {
                    $('.card-toolbar').removeAttr('data-kt-indicator'); // Sembunyikan elemen loading setelah permintaan selesai
                }
            },
            dom: 'Brtip',
            buttons: [
                'csv', 'excel', 'print'
            ],
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

    // setup datatable data compare
    var route_compare = "{{config('app.api_python_url')}}";
    route_compare = route_compare + "/testing/model";
    var datatable_compare = $('#compare-table').DataTable({
            ajax: {
                url: route_compare,
                dataSrc: "data_compare",
                beforeSend: function() {
                    $(".card-toolbar").attr("data-kt-indicator", "on"); // Tampilkan elemen loading
                },
                complete: function() {
                    $('.card-toolbar').removeAttr('data-kt-indicator'); // Sembunyikan elemen loading setelah permintaan selesai
                }
            },
            dom: 'Brtip',
            buttons: [
                'csv', 'excel', 'print'
            ],
            columns: [
                {
                    data: 'actual',
                    name: 'actual',
                    orderable: true,
                    searchable: false,
                    width: '10%'
                },
                {
                    data: 'y_linear',
                    name: 'y_linear',
                    orderable: false,
                    searchable: false,
                    width: '20%',
                },
                {
                    data: 'y_poly',
                    name: 'y_poly',
                    orderable: false,
                    searchable: false,
                    width: '20%'
                },
                {
                    data: 'y_rf',
                    name: 'y_rf',
                    orderable: false,
                    searchable: false,
                    width: '20%'
                },
                {
                    data: 'y_svr',
                    name: 'y_svr',
                    orderable: false,
                    searchable: false,
                    width: '20%'
                },
            ],
            scrollX: true,
        });

    // setup datatable result test
    var route_result = "{{config('app.api_python_url')}}";
    route_result = route_result + "/testing/model";
    var datatable_result = $('#result-table').DataTable({
            ajax: {
                url: route_result,
                dataSrc: "test_result",
                beforeSend: function() {
                    $(".card-toolbar").attr("data-kt-indicator", "on"); // Tampilkan elemen loading
                },
                complete: function() {
                    $('.card-toolbar').removeAttr('data-kt-indicator'); // Sembunyikan elemen loading setelah permintaan selesai
                }
            },
            dom: 'Brtip',
            buttons: [
                'csv', 'excel', 'print'
            ],
            columns: [{
                    data: 'metode',
                    name: 'metode',
                    orderable: false,
                    searchable: false,
                    width: '10%'
                },
                {
                    data: 'rmse',
                    name: 'rmse',
                    orderable: false,
                    searchable: false,
                    width: '10%',
                },
                {
                    data: 'mape',
                    name: 'mape',
                    orderable: false,
                    searchable: false,
                    width: '10%'
                },
            ],
            scrollX: true,
        });

    // on click test button
    $('#test_btn').on('click', function(e){
        e.preventDefault();
        var test_size = $('#test_size').val();
        var setting_param = $("#setting").val();
        $(this).attr("data-kt-indicator", "on");

        var url = "{{config('app.api_python_url')}}";
        url = url + "/split/data";
        $.ajax({
            url: url,
            type: 'GET',
            data: {
                test_size: test_size,
                setting: setting_param
            },
            success: function(response) {
                $('#test_btn').removeAttr('data-kt-indicator');
                Swal.fire({
                    customClass: {
                        confirmButton: 'btn btn-success',
                    },
                    title: 'Successfully testing regression model',
                    text: 'success',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    $('#data_train_section').show();
                    $('#data_test_section').show();
                    $('#data_compare_section').show();
                    $('#graph_section').show();
                    $('#test_result_section').show();
                    datatable_train.ajax.reload();
                    datatable_test.ajax.reload();
                    datatable_compare.ajax.reload();
                    datatable_result.ajax.reload();
                    var mode = KTThemeMode.getMode();
                    getGraphData(getColorMode(mode));
                });
            },
            error: function(xhr, textStatus, error) {
                $('#test_btn').removeAttr('data-kt-indicator');
                if (textStatus === "error" && error === "") {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'An error occurred in the Python Regression Model API, make sure the API is running on the server!',
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