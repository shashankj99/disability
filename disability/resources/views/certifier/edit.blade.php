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
                <h1 class="m-0 text-dark">प्रमाणित गर्ने व्यक्ती परिवर्तन गर्नुहोस</h1>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <form action="{{ route('certifier.update', $certifier->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                {{method_field('PUT')}}
                @include('certifier._form', ['buttonText' => 'परिवर्तन गर्नुहोस'])
            </form>
        </div>
    </div>

@endsection
