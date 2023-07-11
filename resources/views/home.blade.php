@extends('layouts.app')

@section('content')
<div class="content d-flex flex-column flex-column-fluid pt-0" id="kt_content">
    <div class="container mt-7">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header justify-content-center">
                        <div class="card-title"><h1>Selamat Datang di Sistem Prediksi Hasil Panen Budidaya Perikanan</h1></div>
                    </div>
                    <div class="card-body">
                        <h4 class="text-center">Silahkan pilih menu yang ada di sidebar, untuk prediksi dapat memilih menu prediksi hasil panen</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card shadow-sm bg-light-secondary h-70">
                    <div class="card-header">
                        <div class="card-title">
                            <h3>Tingkat Kelangsungan Hidup Komoditas (%)</h3>
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
                            <h3>Rata-Rata Hasil Panen Setiap Komoditas (kg)</h3>
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

    var chart_harvest = new ApexCharts(element_harvest, getOptions(getColorMode(KTThemeMode.getMode()), [], [], 'Rata-Rata Hasil Panen (kg)'));
    chart_harvest.render();

    const getData = (color) =>{
        var url = '{{route("chart.data")}}';

        $.getJSON(url, function(response) {
            chart.updateOptions(getOptions(color, response.series, response.fish_type, 'Survival Rate (%)'));
            chart_harvest.updateOptions(getOptions(color, response.series_harvest, response.fish_type, 'Rata-Rata Hasil Panen (kg)'));
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