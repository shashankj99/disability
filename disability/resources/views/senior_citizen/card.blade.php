@extends('layouts.app')

@section('content')

        <div class="row">
            <div class="col-md-12 text-right mb-3">
                <a class="btn btn-success btnPrint" href='{{ route('senior.show', $senior->id) }}'><i class="fas fa-fw fa-print"></i> प्रिन्ट गर्नुहोस</a>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Id Card Front Part -->
                <div class="print-size-front mt-2">
                    <div class="row">
                        <div class="col">
                            <div class="samanya-idcard-wrapper">
                                <div class="idcard-border">
                                    <div class="row">
                                        <div class="col-2"><img src="{{ asset('img/logo.png') }}" style="width: 80px;"></div>
                                        <div class="col-8">
                                            <div class="id-title">
                                                <h1>{{ $senior->user->name }}<br></h1>
                                                <p>नगर कार्यपालिकाको कार्यालयलय <br> </p>
                                                <h2>ज्येष्ठ नागरिक परिचय-पत्र </h2>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="id-photo-frame">
                                                @if ($senior->image)
                                                    <img src="{{ asset('img/senior_citizen/'.$senior->image) }}" alt="" width="100" height="120">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="id-body">
                                        <div class="row">
                                            <div class="col">नाम थर: <span class="input-padder">{{$senior->name}}</span></div>
                                        </div>
                                    <div class="row">
                                        <div class="col">ना.प्र.नं.: <span class="input-padder">{{$senior->citizenship_no}}</span> </div>
                                    </div>
                                        <div class="row">
                                            <div class="col">ठेगाना: जिल्ला {{$senior->district}}</div>
                                        <div class="col">गा.पा./न.पा.: {{$senior->local_level}} </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">वडा नं.: <span class="input-padder">{{$numberConverter->devanagari($senior->ward_no)}}</span></div>
                                        <div class="col">टोल/गाउँ: <span class="input-padder">{{$senior->locality}}</span></div>
                                    </div>
                                        <div class="row">
                                            <div class="col-6">जन्म मिति/उमेर: <span class="input-padder">{{$senior->dob_nepali}}/{{$numberConverter->devanagari($senior->age)}}</span></div>
                                            <div class="col-3">लिङ्ग: <span class="input-padder">{{$senior->getGender()}}</span></div>
                                            <div class="col-3">रक्त समूह: <span class="input-padder">{{$senior->blood_group}}</span></div>
                                        </div>
                                        <div class="row">
                                            <div class="col">उपलब्ध छुट तथा सुविधाहरु: <span class="input-padder">{{$senior->facilities}}</span></div>
                                        </div>
                                        <div class="row">
                                            <div class="col">पति/पत्नीको नाम: <span class="input-padder">{{$senior->spouse_name}}</span></div>
                                        </div>
                                        <div class="row">
                                            <div class="col">हेरचाह केन्द्रमा बसेको भए सोको विवरण: <span class="input-padder">{{$senior->home_care_name}}</span></div>
                                        </div>
                                        <div class="row">
                                            <div class="col text-center note-nepali">यो परिचय-पत्र कसैले पाएमा नजिकैको प्रहरी चौकी वा स्थानीय तहमा बुझाइदिनु होला</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Id Card Back Part -->
                <div class="print-size-back mt-4">
                    <div class="row">
                        <div class="col">
                            <div class="samanya-idcard-wrapper">
                                <div class="idcard-border">
                                    <div class="idcard-back">
                                    <div class="row">
                                        <div class="col">सम्पर्क गर्नुपर्ने व्यक्तिको नाम, थर: <span class="input-padder">{{$senior->contact_person_name}}</span></div>
                                    </div>
                                    <div class="row">
                                        <div class="col">सम्पर्क गर्नुपर्ने व्यक्तिको ठेगाना: <span class="input-padder">{{$senior->contact_person_address}}</span></div>
                                    </div>
                                    <div class="row">
                                        <div class="col">रोग भए रोगको नाम: <span class="input-padder">{{$senior->disease}}</span></div>
                                    </div>
                                    <div class="row">
                                        <div class="col">सेवन गरिएको औषधिको नाम: <span class="input-padder">{{$senior->mdeicine}}</span></div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col"><span class="text-danger font-underline">प्रमाणित गर्ने अधिकृतको</span></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 mt-4">
                                            <div class="row">
                                                <div class="col mb-2">दस्तखत:</div>
                                            </div>
                                            <div class="row">
                                                <div class="col mb-2">नाम, थर:</div>
                                            </div>
                                            <div class="row">
                                                <div class="col mb-2">पद:</div>
                                            </div>
                                            <div class="row">
                                                <div class="col mb-2">कार्यालय:</div>
                                            </div>
                                            <div class="row">
                                                <div class="col mb-2">मिति:</div>
                                            </div>
                                        </div>
                                        <div class="col-6 mt-2">
                                            <div class="row">
                                                <div class="col-6 mt-4">
                                                    <div class="stamp-box">
                                                        <div class="stamp-box-border text-center">
                                                            <span class="font-11 font-bold">कार्यालय छाप</span>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                            <div class="col text-center mt-3 note-nepali">यो परिचय-पत्र कसैले पाएमा नजिकैको प्रहरी चौकी वा स्थानीय तहमा बुझाइदिनु होला</div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Id Card Back Part -->
            </div>
        </div>

@endsection

@section('page-scripts')
    <script src="{{ asset('js/jquery.printPage.js') }}"></script>
    <script>  
        jQuery(function($) {
            $(".btnPrint").printPage();
        });
    </script>
@endsection
