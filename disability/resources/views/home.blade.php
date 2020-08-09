@extends('layouts.app')

@section('content-header')
    <div class="row mb-2">
        <div class="col-12">
            <h1 class="m-0 text-dark">ड्यासबोर्ड र एनालिटिक्स</h1>
        </div>
    </div>
@endsection

@section('content')
<div class="container">

    {{-- Disability dashboard --}}
    <div class="row">

        <div class="col-12 col-sm-6 col-md-3 mb-2">
            <!-- small box -->
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{ $numberConverter->devanagari($totalDisablePeoples) }}</h3>
                    <p>जम्मा अपाङ्ग व्यक्ती संख्या</p>
                </div>
                <div class="icon">
                    <i class="fas fa-wheelchair"></i>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-3 mb-2">
            <!-- small box -->
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{ $numberConverter->devanagari($totalMaleDisabilities) }}</h3>
                    <p>जम्मा पुरुष अपाङ्ग संख्या</p>
                </div>
                <div class="icon">
                    <i class="fas fa-male"></i>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-3 mb-2">
            <!-- small box -->
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{ $numberConverter->devanagari($totalFemaleDisabilities) }}</h3>
                    <p>जम्मा महिला अपाङ्ग संख्या</p>
                </div>
                <div class="icon">
                    <i class="fas fa-female"></i>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-3 mb-2">
            <!-- small box -->
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{ $numberConverter->devanagari($totalOtherDisabilities) }}</h3>
                    <p>जम्मा तेस्रो लिङ्गी अपाङ्ग संख्या</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-injured"></i>
                </div>
            </div>
        </div>
        
    </div>

    {{-- Disability dashboard --}}
    <div class="row">

        <div class="col-12 col-sm-6 col-md-3 mb-2">
            <!-- small box -->
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{ $numberConverter->devanagari($totalSeniorPeoples) }}</h3>
                    <p>जम्मा जेष्ठ नागरिक व्यक्ती संख्या</p>
                </div>
                <div class="icon">
                    <i class="fas fa-blind"></i>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-3 mb-2">
            <!-- small box -->
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{ $numberConverter->devanagari($totalSeniorMale) }}</h3>
                    <p>जम्मा पुरुष जेष्ठ नागरिक संख्या</p>
                </div>
                <div class="icon">
                    <i class="fas fa-male"></i>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-3 mb-2">
            <!-- small box -->
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{ $numberConverter->devanagari($totalSeniorFemale) }}</h3>
                    <p>जम्मा महिला जेष्ठ नागरिक संख्या</p>
                </div>
                <div class="icon">
                    <i class="fas fa-female"></i>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-3 mb-2">
            <!-- small box -->
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{ $numberConverter->devanagari($totalSeniorOther) }}</h3>
                    <p>जम्मा तेस्रो लिङ्गी जेष्ठ नागरिक</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-injured"></i>
                </div>
            </div>
        </div>
        
    </div>

    <div class="row my-3">
        <div class="col-12 col-sm-12 col-md-6">
            <div class="text-center">
                <h4>{{($isAdmin == 1) ? "प्रदेश" : "वडा"}} स्तरिय अपाङ्ग व्यक्ती ग्राफ</h4>
            </div>
            <br>
            <div class="chart">
                <canvas id="wardChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-6">
            <div class="text-center">
                <h4>{{($isAdmin == 1) ? "प्रदेश" : "वडा"}} स्तरिय जेष्ठ नागरिक व्यक्ती ग्राफ</h4>
            </div>
            <br>
            <div class="chart">
                <canvas id="seniorChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
        </div>
    </div>

</div>
@endsection

@section('page-scripts')
    <script src="{{ asset('js/Chart.min.js') }}"></script>
    <script>
        jQuery(function($) {
            $(function () {
                let wardNumberArray = {{ json_encode($wardNoArray) }},
                    wardNumberArraySenior = {{ json_encode($wardNoArraySenior) }},
                    isAdmin = {{ $isAdmin }},
                    wardArraySenior = [],
                    wardArray = [];
                if (isAdmin == 1) {
                    $.each(wardNumberArray, function(index, val) {
                        if (val == 3) {
                            wardArray.push("Bagmati Province");
                        } else if (val == 4) {
                            wardArray.push("Gandaki Province");
                        } else if (val == 6) {
                            wardArray.push("Karnali Province");
                        } else if (val == 7) {
                            wardArray.push("Far-Western Province");
                        } else {
                            wardArray.push("Province-"+val);
                        }
                    });

                    $.each(wardNumberArraySenior, function(index, val) {
                        if (val == 3) {
                            wardArraySenior.push("Bagmati Province");
                        } else if (val == 4) {
                            wardArraySenior.push("Gandaki Province");
                        } else if (val == 6) {
                            wardArraySenior.push("Karnali Province");
                        } else if (val == 7) {
                            wardArraySenior.push("Far-Western Province");
                        } else {
                            wardArraySenior.push("Province-"+val);
                        }
                    });

                } else {
                    $.each(wardNumberArray, function(index, val) {
                        wardArray.push("Ward No-"+val);
                    });

                    $.each(wardNumberArraySenior, function(index, val) {
                        wardArraySenior.push("Ward No-"+val);
                    });
                }

                let wardChartCanvas = $('#wardChart').get(0).getContext('2d');

                let wardChartData = {
                    labels  : wardArray,
                    datasets: [
                        {
                            label               : 'जम्मा अपाङ्ग संख्या',
                            backgroundColor     : '#007bff',
                            borderColor         : '#007bff',
                            pointRadius          : false,
                            pointColor          : '#3b8bba',
                            pointStrokeColor    : '#007bff',
                            pointHighlightFill  : '#fff',
                            pointHighlightStroke: '#007bff',
                            data                : {{json_encode($wardNoValue)}},
                            fill                : false
                        }
                    ]
                }

                let wardChartOptions = {
                    maintainAspectRatio : false,
                    responsive : true,
                    legend: {
                        display: true
                    },
                    scales: {
                        xAxes: [{
                            gridLines : {
                                display : true,
                            }
                        }],
                        yAxes: [{
                            gridLines : {
                                display : true,
                            },
                            ticks: {
                                beginAtZero: true,
                                userCallback: function(label, index, labels) {
                                    // when the floored value is the same as the value we have a whole number
                                    if (Math.floor(label) === label) {
                                        return label;
                                    }

                                },
                            }
                        }]
                    }
                }

                // This will get the first returned node in the jQuery collection.
                let wardChart = new Chart(wardChartCanvas, { 
                    type: 'line',
                    data: wardChartData,
                    options: wardChartOptions,
                });


                let seniorChartCanvas = $('#seniorChart').get(0).getContext('2d');

                let seniorChartData = {
                    labels  : wardArraySenior,
                    datasets: [
                        {
                            label               : 'जम्मा जेष्ठ नागरिक संख्या',
                            backgroundColor     : '#007bff',
                            borderColor         : '#007bff',
                            pointRadius          : false,
                            pointColor          : '#3b8bba',
                            pointStrokeColor    : '#007bff',
                            pointHighlightFill  : '#fff',
                            pointHighlightStroke: '#007bff',
                            data                : {{json_encode($wardNoValueSenior)}},
                            fill                : false
                        }
                    ]
                }

                let seniorChartOptions = {
                    maintainAspectRatio : false,
                    responsive : true,
                    legend: {
                        display: true
                    },
                    scales: {
                        xAxes: [{
                            gridLines : {
                                display : true,
                            }
                        }],
                        yAxes: [{
                            gridLines : {
                                display : true,
                            },
                            ticks: {
                                beginAtZero: true,
                                userCallback: function(label, index, labels) {
                                    // when the floored value is the same as the value we have a whole number
                                    if (Math.floor(label) === label) {
                                        return label;
                                    }

                                },
                            }
                        }]
                    }
                }

                // This will get the first returned node in the jQuery collection.
                let seniorChart = new Chart(seniorChartCanvas, { 
                    type: 'line',
                    data: seniorChartData,
                    options: seniorChartOptions,
                });

            });
        });
    </script>
@endsection
