@extends('layouts.app')

@section('page-styles')
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nepali.datepicker.v2.1.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
@endsection

@section('content-header')
    <div class="row mb-2">
        <div class="col-12">
            <h1 class="m-0 text-dark">अपाङ्ग व्यक्ती व्यवस्थापन पृष्ठ</h1>
        </div>
    </div>
@endsection

@section('content')
    
    {{-- Info Box --}}
    <div class="row">
        <div class="col-12">
            <div class="card card-outline card-warning">
                <div class="card-header">
                    <h3 class="card-title">जानकारी !</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                        </button>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    यो पृष्ठ प्रयोगकर्ता निर्दिष्ट छ। वांछनीय आउटपुट प्राप्त गर्न प्रयोगकर्ताले थप गरेको डाटा सहि हुनुपर्छ। प्रयोगकर्ताले सीधै टेबल डाटा प्रिन्ट गर्न वा एक्सेल ढाँचामा डाउनलोड गर्न सक्दछ।
                </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

    {{-- Disable Register Button --}}
    <div class="row">
        <div class="col-12 col-sm-12 col-md-4"></div>
        <div class="col-12 col-sm-12 col-md-4 my-2">
            <a href="{{ route('disable.create') }}" class="btn btn-block btn-primary">
                <i class="fas fa-plus"></i> अपाङ्ग व्यक्ती विवरण थप्नुहोस्
            </a>
        </div>
        <div class="col-12 col-sm-12 col-md-4"></div>
    </div>

    {{-- filter data --}}
    <div class="row my-2">
        <div class="col-12">
            <div class="card card-outline">
                <div class="card-header">
                    <h3 class="card-title">डाटा फिल्टर गर्नुहोस् !</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('disable.index') }}" method="POST">
                        @csrf
                        @include('disable._filter', ['districtNames' => $districtNames, 'localLevelNames' => $localLevelNames, 'numberConverter' => $numberConverter])
                    </form>
                </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

    {{-- Disability table --}}
    <div class="row my-3">
        <div class="col-12">
            <div class="table-responsive-sm">
                <table class="table table-hover" id="disable-table">
                    <thead>
                        <tr>
                            <th>क्रम संख्या</th>
                            <th>नाम</th>
                            <th>जन्म मिति (उमेर)</th>
                            <th>लिङ्ग</th>
                            <th>ठेगाना</th>
                            <th>रक्त समूह</th>
                            <th>अपाङ्गताको प्रकृति</th>
                            <th>अपाङ्गताको गम्भिरता</th>
                            <th>कार्यहरू</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($disables as $disable)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $disable->nep_name }}</td>
                                <td>{{ $disable->dob_nepali }} {{ " (". $disable->age.") " }}</td>
                                <td> {{ $disable->gender }}</td>
                                <td>{{ $disable->local_level." - ".$numberConverter->devanagari($disable->ward_no).", ".$disable->district.", ".$disable->state }}</td>
                                <td>{{ $disable->blood_group }}</td>
                                <td>{{ $disable->disability_category }}</td>
                                <td>{{ $disable->disability_severity }}</td>
                                <td>
                                    <a href="{{ route('disable.show', $disable->id) }}" class="btn btn-outline-info btn-sm show-details" data-toggle="tooltip" data-placement="top" title="अपाङ्ग कार्ड हेर्नुहोस्">
                                        <i class="far fa-id-card"></i>
                                    </a>
                                    <a href="{{ route('disable.edit', $disable->id) }}" class="btn btn-outline-success btn-sm edit-details" data-toggle="tooltip" data-placement="top" title="विवरण सम्पादन गर्नुहोस्">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="#" class="btn btn-outline-danger btn-sm delete-disable" data-id="{{ $disable->id }}" data-toggle="tooltip" data-placement="top" title="विवरण हटाउनुहोस्">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@section('page-scripts')
    <script src="{{ asset('js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('js/dataTableButtons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/dataTableButtons/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('js/dataTableButtons/buttons.print.min.js') }}"></script>
    <script src="{{ asset('js/dataTableButtons/jszip.min.js') }}"></script>
    <script src="{{ asset('js/nepali.datepicker.v2.1.min.js') }}"></script>
    <script src="{{ asset('js/nepalidate.js') }}"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>

    <script>
        jQuery(function($) {
            // data table
            $('#disable-table').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: "print",
                        title: "अपाङ्ग व्यक्ती व्यवस्थापन",
                        exportOptions: {
                            columns: [1, 2, 3, 4, 5, 6, 7],
                        },
                        text: '<i class="fas fa-fw fa-print"></i> प्रिन्ट गर्नुहोस'
                    },
                    {
                        extend: "excel",
                        title: "अपाङ्ग व्यक्ती व्यवस्थापन",
                        exportOptions: {
                            columns: [1, 2, 3, 4, 5, 6, 7],
                        },
                        text: '<i class="fas fa-fw fa-file-excel"></i> एकसेलको रूपमा डाउनलोड गर्नुहोस'
                    },
                ]
            });

            // tooltip for buttons
            $('.btn').tooltip();

            // select 2
            $('.select2').select2();

            $('#disable-table').on('click', '.delete-disable', function(e) {
                e.preventDefault();

                if (confirm("के तपाई निश्चित यो विवरण हटाउन चाहानुहुन्छ?")) {
                    let id = this.dataset.id,
                        url = "{{ route('disable.destroy', ':id') }}";

                    url = url.replace(":id", id);

                    $.ajax({
                        url: url,
                        type: "DELETE",
                        data: {
                            "_token": "{{ csrf_token() }}",
                        },
                        success:function(response) {
                            alert(response);
                            location.reload();
                        }
                    });
                } else {
                    return false;
                }
            });
        });
    </script>
@endsection