@extends('layouts.app')

@section('content')
<div class="content d-flex flex-column flex-column-fluid pt-0" id="kt_content">
    <div class="container mt-7">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <!--begin::Alert-->
                <div
                    class="alert alert-dismissible bg-light-secondary shadow-sm d-flex flex-column flex-sm-row p-5">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-column text-light pe-0 pe-sm-10 me-10">
                        <!--begin::Title-->
                        <h1 class="mb-2 light">{{$users}}</h1>
                        <!--end::Title-->

                        <!--begin::Content-->
                        <h4 class="light">Users</h4>
                        <!--end::Content-->
                    </div>
                    <!--end::Wrapper-->
                    <!--begin::Icon-->
                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor"
                        class="bi bi-people" viewBox="0 0 16 16">
                        <path
                            d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8Zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816ZM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4Z" />
                    </svg>
                    <!--end::Icon-->
                </div>
                <!--end::Alert-->
            </div>
            <div class="col-md-3">
                <!--begin::Alert-->
                <div
                    class="alert alert-dismissible bg-light-secondary shadow-sm d-flex flex-column flex-sm-row p-5">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-column text-light pe-0 pe-sm-10 me-10">
                        <!--begin::Title-->
                        <h1 class="mb-2 light">{{$mitra}}</h1>
                        <!--end::Title-->

                        <!--begin::Content-->
                        <h4 class="light">Mitra Panen</h4>
                        <!--end::Content-->
                    </div>
                    <!--end::Wrapper-->
                    <!--begin::Icon-->
                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor"
                        class="bi bi-person" viewBox="0 0 16 16">
                        <path
                            d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                    </svg>
                    <!--end::Icon-->
                </div>
                <!--end::Alert-->
            </div>
            <div class="col-md-3">
                <!--begin::Alert-->
                <div
                    class="alert alert-dismissible bg-light-secondary shadow-sm d-flex flex-column flex-sm-row p-5">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-column text-light pe-0 pe-sm-10 me-10">
                        <!--begin::Title-->
                        <h1 class="mb-2 light">{{$admin}}</h1>
                        <!--end::Title-->

                        <!--begin::Content-->
                        <h4 class="light">Admin</h4>
                        <!--end::Content-->
                    </div>
                    <!--end::Wrapper-->
                    <!--begin::Icon-->
                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor"
                        class="bi bi-person-gear" viewBox="0 0 16 16">
                        <path
                            d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm.256 7a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Zm3.63-4.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382l.045-.148ZM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z" />
                    </svg>
                    <!--end::Icon-->
                </div>
                <!--end::Alert-->
            </div>
            <div class="col-md-3">
                <!--begin::Alert-->
                <div
                    class="alert alert-dismissible bg-light-secondary shadow-sm d-flex flex-column flex-sm-row p-5">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-column text-light pe-0 pe-sm-10 me-10">
                        <!--begin::Title-->
                        <h1 class="mb-2 light">{{$commodity}}</h1>
                        <!--end::Title-->

                        <!--begin::Content-->
                        <h4 class="light">Commodities</h4>
                        <!--end::Content-->
                    </div>
                    <!--end::Wrapper-->
                    <!--begin::Icon-->
                    <svg width="100" height="100" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10.187 2.30762C7.11111 2.30762 4.32476 3.6317 2.30859 5.76988V5.77113C4.48283 8.07716 7.33559 9.23069 10.187 9.23069H10.1883C11.9896 7.31977 11.9902 4.21916 10.187 2.30762ZM7.53186 5.76988C7.4461 5.76991 7.36118 5.75201 7.28194 5.71721C7.20271 5.68242 7.13072 5.6314 7.07009 5.56708C7.00946 5.50276 6.96138 5.4264 6.92859 5.34236C6.8958 5.25832 6.87895 5.16825 6.879 5.07731C6.87895 4.98637 6.8958 4.89631 6.92859 4.81228C6.96138 4.72826 7.00947 4.65191 7.0701 4.5876C7.13074 4.5233 7.20273 4.4723 7.28196 4.43753C7.36119 4.40275 7.44611 4.38488 7.53186 4.38493C7.61762 4.38488 7.70255 4.40275 7.78179 4.43752C7.86103 4.4723 7.93303 4.52329 7.99368 4.58759C8.05433 4.65189 8.10244 4.72824 8.13525 4.81227C8.16806 4.89629 8.18494 4.98636 8.18491 5.07731C8.18497 5.16827 8.16811 5.25836 8.13531 5.34241C8.10251 5.42646 8.05441 5.50283 7.99375 5.56715C7.9331 5.63148 7.86109 5.68249 7.78183 5.71727C7.70258 5.75206 7.61763 5.76994 7.53186 5.76988Z"
                            fill="currentColor" />
                        <path opacity="0.5"
                            d="M12.1676 2.30762C12.8127 3.29786 13.1551 4.45452 13.153 5.63616C13.1551 6.87366 12.7791 8.08231 12.0752 9.10039C13.4121 9.41955 14.4108 10.614 14.4108 12.0484C14.4108 13.7254 13.0494 15.0861 11.3715 15.0861H11.2756C10.9743 13.9241 9.92697 13.0604 8.66968 13.0604L4.61719 13.0618C4.61719 14.0171 4.87513 14.9446 5.34927 15.7613C4.87574 16.5781 4.61719 17.5068 4.61719 18.4615H8.66968C9.92697 18.4615 10.9743 17.5985 11.2756 16.4363H11.3715C15.288 16.4363 18.4633 13.2627 18.4633 9.34827C18.4633 5.7034 15.7089 2.70374 12.1676 2.30762Z"
                            fill="currentColor" />
                        <path
                            d="M16.3327 13H15.666C14.0092 13 12.666 14.3431 12.666 16V17.6667C12.666 18.403 13.263 19 13.9993 19H16.3327C17.9895 19 19.3327 17.6569 19.3327 16C19.3327 14.3431 17.9895 13 16.3327 13Z"
                            fill="currentColor" />
                        <circle cx="15.9993" cy="16.0003" r="0.333333" fill="#F1F1F4" />
                        <circle cx="17.3333" cy="16.0003" r="0.333333" fill="#F1F1F4" />
                        <circle cx="14.6654" cy="16.0003" r="0.333333" fill="#F1F1F4" />
                    </svg>
                    <!--end::Icon-->
                </div>
                <!--end::Alert-->
            </div>
        </div>
        <div class="row justify-content-center mt-3">
            <div class="col-md-6">
                <div class="card shadow-sm bg-light-secondary h-70">
                    <div class="card-header">
                        <div class="card-title">
                            <h3>Commodity Survival Rate (%)</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="kt_apexcharts_3"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow-sm bg-light-secondary">
                    <div class="card-header">
                        <div class="card-title">
                            <h3>Average Harvest Yield of Each Commodity (kg)</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="harvest"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    var element = document.getElementById('kt_apexcharts_3');
    var element_harvest = document.getElementById('harvest');
    var height = parseInt(KTUtil.css(element, 'height'));
    var labelColor = KTUtil.getCssVariableValue('--kt-gray-500');
    var borderColor = KTUtil.getCssVariableValue('--kt-gray-200');
    var baseColor = KTUtil.getCssVariableValue('--kt-primary');
    var lightColor = KTUtil.getCssVariableValue('--kt-primary-light');
    var green = KTUtil.getCssVariableValue('--kt-success');
    var infoColor = KTUtil.getCssVariableValue('--kt-info');

    const getColorMode = (mode) =>{
        var color = 'black';
        if(mode == 'dark'){
            color = 'white';
        } else {
            color = 'black';
        }
        return color;
    }

    const getOptions = (color, data, categories, title_yaxis) => {
        var options = {
            series: data,
            chart: {
                type: 'bar',
                zoom: {
                    type: 'x',
                    enabled: true,
                    autoScaleYaxis: true
                },
                toolbar: {
                    autoSelected: 'zoom'
                }
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: ['30%'],
                    endingShape: 'rounded'
                },
            },
            legend: {
                show: true,
                position: 'top',
                horizontalAlign: 'left',
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
                curve: 'smooth',
                show: true,
                width: 3,
                colors: [baseColor, green, infoColor]
            },
            xaxis: {
                categories: categories,
                labels: {
                    style: {
                        colors: color,
                        fontSize: '12px',
                        fontFamily: 'Helvetica, Arial, sans-serif',
                        fontWeight: 400,
                        cssClass: 'apexcharts-xaxis-label',
                    },
                },
            },
            yaxis: {
                labels: {
                    formatter: function (val) {
                        return (val).toFixed(2);
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
                    return (val).toFixed(2)
                    }
                }
            },
            colors: [lightColor, green, infoColor],
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

    var chart = new ApexCharts(element, getOptions(getColorMode(KTThemeMode.getMode()), [], [], 'Survival Rate (%)'));
    chart.render();

    var chart_harvest = new ApexCharts(element_harvest, getOptions(getColorMode(KTThemeMode.getMode()), [], [], 'Average Harvest Yield (kg)'));
    chart_harvest.render();

    const getData = (color) =>{
        var url = '{{route("chart.data")}}';

        $.getJSON(url, function(response) {
            chart.updateOptions(getOptions(color, response.series, response.fish_type, 'Survival Rate (%)'));
            chart_harvest.updateOptions(getOptions(color, response.series_harvest, response.fish_type, 'Average Harvest Yield (kg)'));
            $('.apexcharts-menu-item').css({color: "black"});
        });
    }

    $(document).ready(function () { 
        var mode = KTThemeMode.getMode();
        getData(getColorMode(mode));
    });

    // change mode 
    $('a[data-kt-element="mode"]').on('click', function(){
        getData(getColorMode($(this).attr('data-kt-value')));
    });

    $('#kt_apexcharts_3').on('click', function(){
        $('.apexcharts-menu-item').css({color: "black"});
    });
</script>
@endpush