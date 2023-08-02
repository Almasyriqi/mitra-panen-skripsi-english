@extends('layouts.app')
@section('title', 'Harvest Yield Prediction')
@section('page-title')
<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 w-100   ">
    <h1 class="page-heading d-flex text-dark fw-bold flex-column justify-content-center my-0">
        Harvest Yield Prediction
    </h1>
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap p-0">
        <!--begin::Info-->
        <div class="d-flex align-items-center flex-wrap mr-1">
            <!--begin::Page Heading-->
            <div class="d-flex align-items-baseline flex-wrap mr-5">
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('index.prediction') }}" class="text-muted">Harvest Yield Prediction &nbsp;</a>
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
<div class="card card-flush mt-5">
    <div class="card-body">
        <div class="mb-5">
            <div class="row">
                <div class="col-md-12">
                    <Label class="form-label required fs-6 fw-bold mt-2 mb-3">Choose the Fish Type</Label>
                    <select class="form-select" data-control="select2"
                        data-placeholder="Choose the type of fish to cultivate" name="fish_type" id="fish_type">
                        <option></option>
                        @foreach ($fish_type as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="mb-5">
            <div class="row">
                <div class="col-md-6">
                    <Label class="form-label required fs-6 fw-bold mt-2 mb-3">Number of Seedlings (tail)</Label>
                    <input type="number" class="form-control" step="any" name="seed_amount" id="seed_amount"
                        placeholder="Enter the number of seedlings to be cultivated">
                </div>
                <div class="col-md-6">
                    <Label class="form-label required fs-6 fw-bold mt-2 mb-3">Average Seedling Weight (gram/tail)</Label>
                    <input type="number" class="form-control" step="any" name="seed_weight" id="seed_weight"
                        placeholder="Enter the weight of the seedlings to be cultivated">
                </div>
            </div>
        </div>

        <div class="mb-5">
            <div class="row">
                <div class="col-md-6">
                    <Label class="form-label required fs-6 fw-bold mt-2 mb-3">Pond Volume (m<sup>3</sup>)</Label>
                    <select type="pond_volume" name="pond_volume" class="form-select" data-control="select2" id="pond_volume"
                        aria-describedby="pond_volume">
                    </select>
                </div>
                <div class="col-md-6">
                    <Label class="form-label required fs-6 fw-bold mt-2 mb-3">Average Weight of Fish per Tail to be sold</Label>
                    <select type="total_fish_count" name="total_fish_count" class="form-select" data-control="select2" id="total_fish_count"
                        aria-describedby="total_fish_count">
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="card-footer pt-0">
        <button class="btn btn-primary" id="predict_btn" type="submit">
            <span class="indicator-label">
                Prediction
            </span>
            <span class="indicator-progress">
                Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
            </span>
        </button>
    </div>
</div>

<div class="card mt-5" id="result_card">
    <div class="card-header align-items-center gap-md-5 collapsible cursor-pointer rotate" data-bs-toggle="collapse"
        data-bs-target="#content_result">
        <div class="card-title">
            <h2>Prediction Result</h2>
            <hr>
        </div>
        <div class="card-toolbar rotate-180">
            <span class="indicator-label">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                    class="bi bi-chevron-down" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                </svg>
            </span>
            <span class="indicator-progress">
                <span class="spinner-border spinner-border-lg align-middle ms-2"></span>
            </span>
        </div>
    </div>
    <div id="content_result" class="collapse show">
        <div class="card-body fs-6 text-gray-700">
            <p>The prediction result is the total weight of the fish at harvest in kilograms.
                The following results provide some results based on previous survival rate data.
            </p>
            <table id="result-table" class="table align-middle table-row-dashed fs-6 gy-5">
                <thead>
                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                        <th>Survival Rate (%)</th>
                        <th>Harvest Yield Prediction (kg)</th>
                    </tr>
                </thead>
                <tbody class="fw-semibold fs-7 text-gray-600">
                </tbody>
            </table>
            <hr>
            <div id="chart_result" class="mt-5"></div>
        </div>
    </div>
</div>

<div class="card mt-5" id="guide_card">
    <div class="card-header align-items-center gap-md-5 collapsible cursor-pointer rotate" data-bs-toggle="collapse"
        data-bs-target="#content_guide">
        <div class="card-title">
            <h2>Cultivation Guide</h2>
            <hr>
        </div>
        <div class="card-toolbar rotate-180">
            <span class="indicator-label">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                    class="bi bi-chevron-down" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                </svg>
            </span>
            <span class="indicator-progress">
                <span class="spinner-border spinner-border-lg align-middle ms-2"></span>
            </span>
        </div>
    </div>
    <div id="content_guide" class="collapse show">
        <div class="card-body fs-6 text-gray-700">
            <p id="guide_desc"></p>
            <!--begin::Accordion-->
            <div class="accordion" id="kt_accordion_1">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="kt_accordion_1_header_1">
                        <button class="accordion-button fs-4 fw-semibold" type="button" data-bs-toggle="collapse"
                            data-bs-target="#kt_accordion_1_body_1" aria-expanded="true"
                            aria-controls="kt_accordion_1_body_1">
                            Water Media Preparation
                        </button>
                    </h2>
                    <div id="kt_accordion_1_body_1" class="accordion-collapse collapse show"
                        aria-labelledby="kt_accordion_1_header_1" data-bs-parent="#kt_accordion_1">
                        <div class="accordion-body" id="preparation">

                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="kt_accordion_1_header_2">
                        <button class="accordion-button fs-4 fw-semibold collapsed" type="button"
                            data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_2" aria-expanded="false"
                            aria-controls="kt_accordion_1_body_2">
                            Seed Stocking
                        </button>
                    </h2>
                    <div id="kt_accordion_1_body_2" class="accordion-collapse collapse"
                        aria-labelledby="kt_accordion_1_header_2" data-bs-parent="#kt_accordion_1">
                        <div class="accordion-body" id="seeding">

                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="kt_accordion_1_header_3">
                        <button class="accordion-button fs-4 fw-semibold collapsed" type="button"
                            data-bs-toggle="collapse" data-bs-target="#kt_accordion_1_body_3" aria-expanded="false"
                            aria-controls="kt_accordion_1_body_3">
                            Cultivation Period
                        </button>
                    </h2>
                    <div id="kt_accordion_1_body_3" class="accordion-collapse collapse"
                        aria-labelledby="kt_accordion_1_header_3" data-bs-parent="#kt_accordion_1">
                        <div class="accordion-body" id="cultivation">

                        </div>
                    </div>
                </div>
            </div>
            <!--end::Accordion-->
        </div>
    </div>
</div>

<div class="card mt-5" id="simulation_card">
    <div class="card-header align-items-center gap-md-5 collapsible cursor-pointer rotate" data-bs-toggle="collapse"
        data-bs-target="#content_simulation">
        <div class="card-title">
            <h2>Simulation of Feeding and Cultivation Weight</h2>
            <hr>
        </div>
        <div class="card-toolbar rotate-180">
            <span class="indicator-label">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                    class="bi bi-chevron-down" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                </svg>
            </span>
            <span class="indicator-progress">
                <span class="spinner-border spinner-border-lg align-middle ms-2"></span>
            </span>
        </div>
    </div>
    <div id="content_simulation" class="collapse show">
        <div class="card-body fs-6 text-gray-700">
            <p>The following is a simulation of aquaculture feeding in kilograms per day and
                average cultured weight per head in grams. Feeding for aquaculture is recommended 2-3 times a day
                with the total given according to what is in the simulation table. There are several simulations
                based on survival rate and yield prediction. 
                {{-- In this section there are also display settings, 
                namely a simple display that only contains a brief feeding simulation and a complete display that 
                contains a complete simulation of feeding, cultivation weight, and simulation charts. --}}
            </p>
            <div class="row">
                <div class="col-md-4">
                    <a href="{{route('excel.download')}}" class="btn btn-primary mb-5">Download Full Simulation Data Excel</a>
                </div>
                {{-- <div class="col-md-3">
                    <select type="display" name="display" class="form-select" data-control="select2" id="display" aria-describedby="display">
                        <option value="simple">Simple Display</option>
                        <option value="full">Complete Display</option>
                    </select>
                </div> --}}
            </div>
            <hr class="mb-5">
            <div class="accordion" id="kt_accordion_2">
                @for ($i = 1; $i < 5; $i++)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="kt_accordion_2_header_{{$i}}">
                        <button class="accordion-button fs-4 fw-semibold" type="button" data-bs-toggle="collapse"
                            data-bs-target="#kt_accordion_2_body_{{$i}}" aria-expanded="true"
                            aria-controls="kt_accordion_2_body_{{$i}}" id="sr-{{$i}}">
                            Survival Rate
                        </button>
                    </h2>
                    <div id="kt_accordion_2_body_{{$i}}" class="accordion-collapse collapse show"
                        aria-labelledby="kt_accordion_2_header_{{$i}}" data-bs-parent="#kt_accordion_2">
                        <div class="accordion-body">
                            <p id="tfs-{{$i}}" class="mb-0">Total Feeding During Cultivation : </p>
                            <p id="prediction-{{$i}}" class="pt-0">Harvest Yield Prediction : </p>
                            {{-- <div class="simple_table">
                                <table id="simple-table-{{$i}}" class="table align-middle table-row-dashed fs-6 gy-5">
                                    <thead>
                                        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                            <th>Cultivation Period (Day-)</th>
                                            <th>Feed spent (kg/day)</th>
                                        </tr>
                                    </thead>
                                    <tbody class="fw-semibold fs-7 text-gray-600">
                                    </tbody>
                                </table>
                            </div> --}}
                            <div class="simulation_table">
                                <table id="simulation-table-{{$i}}" class="table align-middle table-row-dashed fs-6 gy-5">
                                    <thead>
                                        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                            <th>Day</th>
                                            <th>Average Weight (gram/tail)</th>
                                            <th>Feed Spent (kg)</th>
                                            <th>Total Fish Weight (kg)</th>
                                        </tr>
                                    </thead>
                                    <tbody class="fw-semibold fs-7 text-gray-600">
                                    </tbody>
                                </table>
                            </div>
                            <hr class="mt-5 mb-5">
                            <div class="row mt-5" id="chart_{{$i}}">
                                <div class="col-md-6">
                                    <div id="chart_weight_{{$i}}"></div>
                                </div>
                                <div class="col-md-6">
                                    <div id="chart_feed_{{$i}}"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endfor
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    // error handle when API Python not work
    $(document).ajaxError(function(event, jqxhr, settings, thrownError) {
        if (jqxhr.statusText == "abort") {
            console.log("Request canceled");
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Terjadi kesalahan pada API Python Regression Model, pastikan API sudah berjalan pada server!',
            });
        }
    });

    // setup datatable result implements
    var route_result = "{{config('app.api_python_url')}}";
    route_result = route_result + "/implements/result";
    var datatable_result = $('#result-table').DataTable({
            ajax: {
                url: route_result,
                dataSrc: "table_result",
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
                    data: 'sr',
                    name: 'sr',
                    orderable: false,
                    searchable: false,
                    width: '10%'
                },
                {
                    data: 'predict',
                    name: 'predict',
                    orderable: false,
                    searchable: false,
                    width: '10%',
                },
            ],
            scrollX: true,
            "ordering": false
        });

    // setup datatable simulation and simple
    var datatable_simulations = [];
    var datatable_simple_arr = [];
    for (let index = 1; index <= 5; index++) { 
        // datatable simulation
        var datasource_simulation = "table_simulation_" + index;
        var datatable_simulation = $('#simulation-table-'+index).DataTable({
            ajax: {
                url: route_result,
                dataSrc: datasource_simulation,
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
                    data: 'day',
                    name: 'day',
                    orderable: false,
                    searchable: false,
                    width: '10%'
                },
                {
                    data: 'weight',
                    name: 'weight',
                    orderable: false,
                    searchable: false,
                    width: '10%',
                },
                {
                    data: 'feed_spent',
                    name: 'feed_spent',
                    orderable: false,
                    searchable: false,
                    width: '10%',
                },
                {
                    data: 'total_weight',
                    name: 'total_weight',
                    orderable: false,
                    searchable: false,
                    width: '10%',
                },
            ],
            scrollX: true,
            "ordering": false
        });
        datatable_simulations.push(datatable_simulation);

        // datatable simple
        // var datasource_simple = "table_simple_" + index;
        // var datatable_simple = $('#simple-table-'+index).DataTable({
        //     ajax: {
        //         url: route_result,
        //         dataSrc: datasource_simple,
        //         beforeSend: function() {
        //             $(".card-toolbar").attr("data-kt-indicator", "on"); // Tampilkan elemen loading
        //         },
        //         complete: function() {
        //             $('.card-toolbar').removeAttr('data-kt-indicator'); // Sembunyikan elemen loading setelah permintaan selesai
        //         }
        //     },
        //     dom: 'Brtip',
        //     buttons: [
        //         'csv', 'excel', 'print'
        //     ],
        //     columns: [{
        //             data: 'day_range',
        //             name: 'day_range',
        //             orderable: false,
        //             searchable: false,
        //             width: '10%'
        //         },
        //         {
        //             data: 'feed_spent',
        //             name: 'feed_spent',
        //             orderable: false,
        //             searchable: false,
        //             width: '10%',
        //         },
        //     ],
        //     scrollX: true,
        //     "ordering": false
        // });
        // datatable_simple_arr.push(datatable_simple);
    }

    // function for reload datatable simulation
    const reload_datatable_simulation = () =>{
        for (let i = 0; i < datatable_simulations.length; i++) {
            datatable_simulations[i].ajax.reload();
            datatable_simple_arr[i].ajax.reload();
        }
    }

    // function for show data sr, prediction, total feed spent
    const show_data = (sr, tfs, prediction) =>{
        for (let index = 1; index <= 5; index++) {
            $('#sr-'+index).text("Survival Rate "+sr[index-1] + "%");
            $('#tfs-'+index).text("Total Feeding During Cultivation : "+tfs[index-1] + " kg");
            $('#prediction-'+index).text("Harvest Yield Prediction : "+prediction[index-1]+ " kg");
        }
    }

    // attribute for graph
    var element = document.getElementById('chart_result');
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
    const getOptions = (color, data, title, title_xaxis, title_yaxis, stroke_curve) => {
        var options = {
            series: [{
                    name: 'Data',
                    data: data
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
                opacity: 1
            },
            stroke: {
                curve: stroke_curve,
                show: true,
                width: 3,
                colors: [baseColor, green, infoColor, yellow, red]
            },
            xaxis: {
                tickAmount: 15,
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
                    text: title_xaxis,
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
                        return (val).toFixed(1);
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
                    text: title_yaxis,
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
                    return (val).toFixed(1)
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
            title: {
                text: title,
                align: 'left',
                margin: 10,
                offsetX: 0,
                offsetY: 0,
                floating: false,
                style: {
                fontSize:  '18px',
                fontWeight:  'bold',
                fontFamily:  undefined,
                color:  color
                },
            },
            noData: {
                text: 'Loading...'
            }
        };
        return options;
    }

    var chart = new ApexCharts(element, getOptions(getColorMode(KTThemeMode.getMode()), [], 'Prediction Result Chart', 'Survival Rate (%)', 'Harvest Yield Prediction (kg)', 'smooth'));
    chart.render();

    // initialize simulation_chart
    weight_charts = []
    feed_charts = []
    for (let index = 1; index <= 5; index++) {
        var element_weight = document.getElementById('chart_weight_'+index);
        var element_feed = document.getElementById('chart_feed_'+index);
        var chart_weight = new ApexCharts(element_weight, getOptions(getColorMode(KTThemeMode.getMode()), [], 'Graph of Average Fish Weight (g/tail)', 'Day', 'Average Fish Weight (g/tail)', 'smooth'));
        var chart_feed = new ApexCharts(element_feed, getOptions(getColorMode(KTThemeMode.getMode()), [], 'Feeding Chart', 'Day', 'Feed Spent (kg)', 'stepline'));
        chart_weight.render();
        chart_feed.render();
        weight_charts.push(chart_weight);
        feed_charts.push(chart_feed);
    }

    // function for update option simulation chart
    const update_simulation_chart = (color, data_weight, data_feed) =>{
        for (let index = 0; index < weight_charts.length; index++) {
            weight_charts[index].updateOptions(getOptions(color, data_weight[index], 'Graph of Average Fish Weight (g/tail)', 'Day', 'Average Fish Weight (g/tail)', 'smooth'));
            feed_charts[index].updateOptions(getOptions(color, data_feed[index], 'Feeding Chart', 'Day', 'Feed Spent (kg)', 'stepline'));
        }
    }

    // function get data graph
    const getGraphData = (color) => {
        var url = "{{config('app.api_python_url')}}";
        url = url + "/implements/result";
        $.getJSON(url, function(response) {
            chart.updateOptions(getOptions(color, response.graph_result, 'Prediction Result Chart', 'Survival Rate (%)', 'Harvest Yield Prediction (kg)', 'smooth'));
            console.log(response.graph_weight);
            update_simulation_chart(color, response.graph_weight, response.graph_feed);
            $('.apexcharts-menu-item').css({ color: "black" });
            show_data(response.sr, response.total_feed_spent, response.predict);
        });
    }

    // function for check status display simulation
    // const checkDisplay = () =>{
    //     if ($('#display').val() == 'simple') {
    //         for (let index = 1; index < 5; index++) {
    //             $('#chart_'+index).hide();
    //         }
    //         $('.simulation_table').hide();
    //         $('.simple_table').show();
    //     } else {
    //         for (let index = 1; index < 5; index++) {
    //             $('#chart_'+index).show();
    //         }
    //         $('.simulation_table').show();
    //         $('.simple_table').hide();
    //     }
    //     reload_datatable_simulation();
    // }

    var mode = KTThemeMode.getMode();
    $(document).ready(function(){
        $('#result_card').hide();
        $('#guide_card').hide();
        $('#simulation_card').hide();
        // checkDisplay();
        onChangeSelect('{{ route("pond.volume") }}', $('#fish_type').val(), 'pond_volume', $('#seed_amount').val());
        onChangeSelect('{{ route("fish.count") }}', $('#fish_type').val(), 'total_fish_count', $('#seed_amount').val());
        getGraphData(getColorMode(mode));
    });

    // change mode 
    $('a[data-kt-element="mode"]').on('click', function () {
        getGraphData(getColorMode($(this).attr('data-kt-value')));
    });

    $('#chart_result').on('click', function () {
        $('.apexcharts-menu-item').css({ color: "black" });
    });

    // function show succes alert
    const successAlert = (text) =>{
        Swal.fire({
            customClass: {
                confirmButton: 'btn btn-success',
            },
            title: 'Success',
            text: text,
            icon: 'success',
            confirmButtonText: 'OK'
        });
    }

    // function show error alert
    const errorAlert = (text) => {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: text,
        });
    }

    // on change display
    // $('#display').on('change', function(){
    //     checkDisplay();
    // });

    // function get data when select2 changes
    function onChangeSelect(url, fish_id, name, seed_amount) {
        var placeholder_select = '';
        switch (name) {
            case 'pond_volume':
                placeholder_select = 'Enter the volume of the pond to be cultivated';
                break;
            case 'total_fish_count':
                placeholder_select = 'Enter the average weight of fish per fish to be sold';
                break;
            default:
                placeholder_select = 'Choose';
                break;
        }
        $('#'+name).select2({
        ajax: {
            url: url,
            dataType: 'json',
            delay: 250,
            data: function (params) {
                var query = {
                    search: params.term,
                    type: 'public',
                    fish_id: fish_id,
                    seed_amount: seed_amount
                }
                return query;
            },
        },
        placeholder: placeholder_select,
        });
    }

    // on change fish type
    $('#fish_type').on('change', function(){
        var selectedData = $(this).select2('data');
        var fish_name = selectedData.map(function(option) {
            return option.text;
        });
        $('#pond_volume').empty();
        $('#total_fish_count').empty();
        onChangeSelect('{{ route("pond.volume") }}', $(this).val(), 'pond_volume', $('#seed_amount').val());
        onChangeSelect('{{ route("fish.count") }}', $(this).val(), 'total_fish_count', $('#seed_amount').val());
        $.ajax({
            url: "{{route('fish.description')}}",
            type: 'GET',
            data: {
                fish_id: $(this).val()
            },
            success: function (response) {
                var guide_desc = "Contains a guide to "+ fish_name +" cultivation";
                $('#guide_desc').text(guide_desc);
                $('#preparation').text("");
                $('#seeding').text("");
                $('#cultivation').text("");
                $('#preparation').append(response.preparation);
                $('#seeding').append(response.seeding);
                $('#cultivation').append(response.cultivation);
            },
            error: function(xhr, textStatus, error) {
                errorAlert('Error while getting cultivation guide data');
            }
        });
    });

    // on change seed_amount
    $('#seed_amount').on('change', function(){
        $('#pond_volume').empty();
        $('#total_fish_count').empty();
        onChangeSelect('{{ route("pond.volume") }}', $('#fish_type').val(), 'pond_volume', $('#seed_amount').val());
        onChangeSelect('{{ route("fish.count") }}', $('#fish_type').val(), 'total_fish_count', $('#seed_amount').val());
    });

    // on click predict button
    $('#predict_btn').on('click', function(e){
        e.preventDefault();

        // Validation
        if($('#fish_type').val() == '' || $('#seed_amount').val() == '' || $('#seed_weight').val() == '' || $('#pond_volume').val() == '' || $('#total_fish_count').val() == ''){
            errorAlert('Fields must not be empty! Please double check the data entered!');
            return false;
        }
        
        // minimal field = 0
        if($('#seed_amount').val() < 0 || $('#seed_weight').val() < 0){
            errorAlert('Minimum data is 0! Please double check the data entered!');
            return false;
        }

        $(this).attr("data-kt-indicator", "on");
        var route = "{{config('app.api_python_url')}}";
        route = route + "/implements";
        $.ajax({
            url: route,
            type: 'GET',
            data: {
                fish_id: $('#fish_type').val(),
                seed_amount: $('#seed_amount').val(),
                seed_weight: $('#seed_weight').val(),
                pond_volume: $('#pond_volume').val(),
                total_fish_count: $('#total_fish_count').val()
            },
            success: function(response) {
                $('#predict_btn').removeAttr('data-kt-indicator');
                $('#result_card').show();
                $('#guide_card').show();
                $('#simulation_card').show();
                datatable_result.ajax.reload();
                reload_datatable_simulation();
                getGraphData(getColorMode(mode));
                successAlert("Successful harvest prediction");
            },
            error: function(xhr, textStatus, error) {
                $('#predict_btn').removeAttr('data-kt-indicator');
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