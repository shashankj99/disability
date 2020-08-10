@extends('layouts.app')

@section('page-styles')
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap.css') }}">
@endsection

@section('content-header')
    <div class="row mb-2">
        <div class="col-12">
            <h1 class="m-0 text-dark">प्रमाणित गर्ने व्यक्ती व्यवस्थापन पृष्ठ</h1>
        </div>
    </div>
@endsection

@section('content')
    
    {{-- Certifier Register Button --}}
    <div class="row">
        <div class="col-12 col-sm-12 col-md-4"></div>
        <div class="col-12 col-sm-12 col-md-4 my-2">
            <a href="{{ route('certifier.create') }}" class="btn btn-block btn-primary">
                <i class="fas fa-plus"></i> प्रमाणित गर्ने व्यक्ती विवरण थप्नुहोस्
            </a>
        </div>
        <div class="col-12 col-sm-12 col-md-4"></div>
    </div>

    {{-- Certifier table --}}
    <div class="row my-3">
        <div class="col-12">
            <div class="table-responsive-sm">
                <table class="table table-hover" id="certifier-table">
                    <thead>
                        <tr>
                            <th>क्र.स.</th>
                            <th>नाम</th>
                            <th>नाम (English)</th>
                            <th>पद</th>
                            <th>पद (English)</th>
                            <th>कार्यहरू</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($certifiers as $certifier)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $certifier->nep_name }}</td>
                                <td>{{ $certifier->eng_name }}</td>
                                <td>{{ $certifier->post_nepali }}</td>
                                <td>{{ $certifier->post_english }}</td>
                                <td>
                                    <a href="{{ route('certifier.edit', $certifier->id) }}" class="btn btn-outline-success btn-sm edit-details" data-toggle="tooltip" data-placement="top" title="विवरण सम्पादन गर्नुहोस्">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="#" class="btn btn-outline-danger btn-sm delete-certifier" data-id="{{ $certifier->id }}" data-toggle="tooltip" data-placement="top" title="विवरण हटाउनुहोस्">
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

    <script>
        jQuery(function($) {
            // data table
            $('#certifier-table').DataTable();

            // tooltip for buttons
            $('.btn').tooltip();

            $('#certifier-table').on('click', '.delete-certifier', function(e) {
                e.preventDefault();

                if (confirm("के तपाई निश्चित यो विवरण हटाउन चाहानुहुन्छ?")) {
                    let id = this.dataset.id,
                        url = "{{ route('certifier.destroy', ':id') }}";

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