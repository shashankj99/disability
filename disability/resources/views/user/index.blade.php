@extends('layouts.app')

@section('page-styles')
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap.css') }}">
@endsection

@section('content-header')
    <div class="row mb-2">
        <div class="col-12">
            <h1 class="m-0 text-dark">प्रयोगकर्ता व्यवस्थापन पृष्ठ</h1>
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
                    यो पृष्ठ प्रशासक द्वारा मात्र पहुँच योग्य छ| यस पृष्ठमा समावेश कार्यहरू अन्य प्रयोगकर्ताहरूमा प्रतिबन्धित छन्|
                </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

    {{-- User creation Button --}}
    <div class="row">
        <div class="col-12 col-sm-12 col-md-4"></div>
        <div class="col-12 col-sm-12 col-md-4 my-2">
            <a href="{{ route('user.create') }}" class="btn btn-block btn-primary">
                <i class="fas fa-plus"></i> प्रयोगकर्ता थप्नुहोस्
            </a>
        </div>
        <div class="col-12 col-sm-12 col-md-4"></div>
    </div>

    {{-- user table --}}
    <div class="row">
        <div class="col-12">
            <div class="table-responsive-sm">
                <table class="table table-hover" id="user-table">
                    <thead>
                        <tr>
                            <th>क्रम संख्या</th>
                            <th>नाम</th>
                            <th>इ-मेल ठेगाना</th>
                            <th>भूमिका</th>
                            <th>सम्पर्क नम्बर</th>
                            <th>ठेगाना</th>
                            <th>कार्यहरू</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $numberConverter->devanagari(++$i) }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if ($user->email === config('app.admin'))
                                        <span class="badge bg-success">प्रशासक</span>
                                    @else
                                        <span class="badge bg-warning">प्रयोगकर्ता</span>
                                    @endif
                                </td>
                                <td>{{ $numberConverter->devanagari($user->phone) }}</td>
                                <td>{{ $user->address }}</td>
                                <td>
                                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-outline-success btn-sm edit-details" data-toggle="tooltip" data-placement="top" title="प्रयोगकर्ता विवरण सम्पादन गर्नुहोस्">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button class="btn btn-outline-danger btn-sm delete-user" data-id="{{ $user->id }}" data-toggle="tooltip" data-placement="top" title="प्रयोगकर्ता विवरण हटाउनुहोस्">
                                        <i class="fas fa-trash"></i>
                                    </button>
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
            $('#user-table').DataTable();

            // tooltip for buttons
            $('.btn').tooltip();

            $('#user-table').on('click', '.delete-user', function() {
                if (confirm("के तपाई निश्चित यो प्रयोगकर्ता हटाउन चाहानुहुन्छ?")) {
                    let id = this.dataset.id,
                        url = "{{ route('user.destroy', ':id') }}";

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
