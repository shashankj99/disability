@extends('layouts.app')

@section('page-styles')
    <link rel="stylesheet" href="{{ asset('css/nepali.datepicker.v2.1.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
@endsection


@section('content-header')
    <div class="row mb-2">
        <div class="col-12 col-sm-6 col-md-3 mb-2">
            <a href="{{ route('disable.index') }}" class="btn btn-block btn-primary">
                <i class="fas fa-arrow-circle-left"></i> जेष्ठ नागरिक पृष्ठमा फिर्ता जानुहोस्
            </a>
        </div>
        <div class="col-12 col-sm-6 col-md-9 mb-2">
            <div class="text-center">
                <h1 class="m-0 text-dark">जेष्ठ नागरिकको विवरण परिवर्तन गर्नुहोस</h1>
            </div>
        </div>
    </div>
@endsection

@section('content')
    
    <div class="row">
        <div class="col-12">
            <form action="{{ route('senior.update', $senior->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
                @include('senior_citizen._form', ['districtNames' => $districtNames, 'localLevelNames' => $localLevelNames, 'numberConverter' => $numberConverter, 'seniorCitizen' => $senior, 'buttonText' => 'परिवर्तन गर्नुहोस'])
            </form>
        </div>
    </div>

@endsection

@section('page-scripts')
    <script src="{{ asset('js/nepali.datepicker.v2.1.min.js') }}"></script>
    <script src="{{ asset('js/nepalidate.js') }}"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>

    <script>

        jQuery(function($) {
            $('.select2').select2();
        });

    </script>
@endsection
