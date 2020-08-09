@extends('layouts.app')

@section('page-styles')
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nepali.datepicker.v2.1.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
@endsection

@section('content-header')
    <div class="row mb-2">
        <div class="col-12">
            <h1 class="m-0 text-dark">जेष्ठ नागरिक व्यवस्थापन पृष्ठ</h1>
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
            <a href="{{ route('senior.create') }}" class="btn btn-block btn-primary">
                <i class="fas fa-plus"></i> जेष्ठ नागरिक विवरण थप्नुहोस्
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
                    <form action="{{ route('senior.index') }}" method="POST">
                        @csrf
                        @include('senior_citizen._filter', ['districtNames' => $districtNames, 'localLevelNames' => $localLevelNames, 'numberConverter' => $numberConverter])
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
                <table class="table table-hover" id="senior-table">
                    <thead>
                        <tr>
                            <th>क्रम संख्या</th>
                            <th>नाम</th>
                            <th>जन्म मिति</th>
                            <th>उमेर</th>
                            <th>लिङ्ग</th>
                            <th>ठेगाना</th>
                            <th>रक्त समूह</th>
                            <th>नागरिकता प्र.नं.</th>
                            <th>कार्यहरू</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($seniorCitizens as $senior)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $senior->name }}</td>
                                <td>{{ $senior->dob_nepali }}</td>
                                <td>{{ $numberConverter->devanagari($senior->age) }}</td>
                                <td> {{ $senior->getGender() }}</td>
                                <td>{{ $senior->local_level." - ".$numberConverter->devanagari($senior->ward_no).", ".$senior->district.", ".$senior->state }}</td>
                                <td>{{ $senior->blood_group }}</td>
                                <td>{{ $senior->citizenship_no }}</td>
                                <td>
                                    <a href="{{ route('senior.show', $senior->id) }}" class="btn btn-outline-info btn-sm show-details" data-toggle="tooltip" data-placement="top" title="जेष्ठ नागरिक कार्ड हेर्नुहोस्">
                                        <i class="far fa-id-card"></i>
                                    </a>
                                    <a href="{{ route('senior.edit', $senior->id) }}" class="btn btn-outline-success btn-sm edit-details" data-toggle="tooltip" data-placement="top" title="विवरण सम्पादन गर्नुहोस्">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="#" class="btn btn-outline-danger btn-sm delete-senior" data-id="{{ $senior->id }}" data-toggle="tooltip" data-placement="top" title="विवरण हटाउनुहोस्">
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
            $('#senior-table').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: "print",
                        title: "जेष्ठ नागरिक व्यवस्थापन",
                        exportOptions: {
                            columns: [1, 2, 3, 4, 5, 6, 7],
                        },
                        text: '<i class="fas fa-fw fa-print"></i> प्रिन्ट गर्नुहोस'
                    },
                    {
                        extend: "excel",
                        title: "जेष्ठ नागरिक व्यवस्थापन",
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

            $('#senior-table').on('click', '.delete-senior', function(e) {
                e.preventDefault();

                if (confirm("के तपाई निश्चित यो विवरण हटाउन चाहानुहुन्छ?")) {
                    let id = this.dataset.id,
                        url = "{{ route('senior.destroy', ':id') }}";

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