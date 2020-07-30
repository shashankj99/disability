@extends('layouts.app')

@section('content-header')
    <div class="row mb-2">
        <div class="col-12 col-sm-6 col-md-3 mb-2">
            <a href="{{ route('user.index') }}" class="btn btn-block btn-primary">
                <i class="fas fa-arrow-circle-left"></i> तालिका पृष्ठमा फिर्ता जानुहोस्
            </a>
        </div>
        <div class="col-12 col-sm-6 col-md-9 mb-2">
            <div class="text-center">
                <h1 class="m-0 text-dark">प्रयोगकर्ताको विवरण सम्पादन गर्नुहोस्</h1>
            </div>
        </div>
    </div>
@endsection

@section('content')
    
    <div class="row">
        <div class="col-12">
            <form action="{{ route('user.update', $user->id) }}" method="post">
                @csrf
                {{ method_field('PUT') }}
                @include('user._form', ['buttonText' => 'परिवर्तन गर्नुहोस्', 'user' => $user])
            </form>
        </div>
    </div>

@endsection