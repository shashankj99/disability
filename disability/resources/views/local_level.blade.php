@extends('layouts.app')

@section('page-styles')
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap.css') }}">
@endsection

@section('content-header')
    <div class="row mb-2">
        <div class="col-12">
            <h1 class="m-0 text-dark">स्थान्य तह तालिका पृष्ठ</h1>
        </div>
    </div>
@endsection

@section('content')

    {{-- Local Level table --}}
    <div class="row my-3">
        <div class="col-12">
            <div class="table-responsive-sm">
                <table class="table table-hover" id="localLevel-table">
                    <thead>
                        <tr>
                            <th>क्र.स.</th>
                            <th>नाम</th>
                            <th>नाम (English)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($localLevels as $localLevel)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $localLevel->nep_name }}</td>
                                <td>{{ $localLevel->eng_name }}</td>
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
            $('#localLevel-table').DataTable();
        });
    </script>
@endsection