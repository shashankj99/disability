@extends('layouts.app')

@section('content-header')
    <div class="row mb-2">
        <div class="col-12 col-sm-6 col-md-3 mb-2">
            <a href="{{ route('certifier.index') }}" class="btn btn-block btn-primary">
                <i class="fas fa-arrow-circle-left"></i> प्रमाणित गर्ने पृष्ठमा फिर्ता जानुहोस्
            </a>
        </div>
        <div class="col-12 col-sm-6 col-md-9 mb-2">
            <div class="text-center">
                <h1 class="m-0 text-dark">नयाँ प्रमाणित गर्ने व्यक्ती दर्ता गर्नुहोस्</h1>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <form action="{{ route('certifier.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @include('certifier._form', ['buttonText' => 'दर्ता गर्नुहोस्'])
            </form>
        </div>
    </div>

@endsection
