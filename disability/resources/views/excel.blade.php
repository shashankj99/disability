@extends('layouts.app')

@section('content-header')
    <div class="row mb-2">
        <div class="col-12">
            <h1 class="m-0 text-dark">एक्सेल आयात पृष्ठ</h1>
        </div>
    </div>
@endsection

@section('content')
    <div class="row my-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            नमूना एक्सेल पाना डाउनलोड गर्न तलको लिंकमा क्लिक गर्नुहोस्। हामी तपाईंलाई हाम्रो द्वारा प्रदान गरिएको नमूना डाउनलोड गर्न सिफारिस गर्दछौं ताकि कुनै सुस्त डाटा प्रविष्टि तालिकामा नहोस्|
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-12 col-sm-6 col-md-6 text-center">
                            <a href="{{ asset('file/excel/disability.xlsx') }}" class="btn btn-link">
                            <i class="fas fa-download fa-fw"></i> अपाङ्ग व्यक्ती विवरणकोलागी नमूना एक्सेल पाना डाउनलोड गर्नुहोस्</a>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 text-center">
                            <a href="{{ asset('file/excel/senior_citizen.xlsx') }}" class="btn btn-link">
                            <i class="fas fa-download fa-fw"></i> जेष्ठ नागरिक विवरणकोलागी नमूना एक्सेल पाना डाउनलोड गर्नुहोस्</a>
                        </div>
                    </div>
                    <form action="{{ route('import.disability') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row my-3">
                            <div class="col-12 col-sm-4 col-md-4 my-2">
                                अपाङ्ग व्यक्ती विवरणकोलागी एक्सेल पाना चयन गर्नुहोस्
                            </div>
                            <div class="col-12 col-sm-4 col-md-4 my-2">
                                <input type="file" name="select_file" id="select_file">
                            </div>
                            <div class="col-12 col-sm-4 col-md-4 my-2 text-right">
                                <button type="submit" class="btn btn-success btn-block">
                                    <i class="fas fa-upload fa-fw"></i> अपलोड गर्नुहोस्
                                </button>
                            </div>
                        </div>
                    </form>
                    <br>
                    <form action="{{ route('import.senior') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row my-3">
                            <div class="col-12 col-sm-4 col-md-4 my-2">
                                जेष्ठ नागरिक विवरणकोलागी एक्सेल पाना चयन गर्नुहोस्
                            </div>
                            <div class="col-12 col-sm-4 col-md-4 my-2">
                                <input type="file" name="select_file" id="select_file">
                            </div>
                            <div class="col-12 col-sm-4 col-md-4 my-2 text-right">
                                <button type="submit" class="btn btn-success btn-block">
                                    <i class="fas fa-upload fa-fw"></i> अपलोड गर्नुहोस्
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
