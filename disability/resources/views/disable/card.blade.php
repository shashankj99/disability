@extends('layouts.app')

@section('content')

        <div class="row">
            <div class="col-md-12 text-right mb-3">
                <a class="btn btn-success btnPrint" href='{{ route('disable.show', $disable->id) }}'><i class="fas fa-fw fa-print"></i> प्रिन्ट गर्नुहोस</a>
            </div>
        </div>

        <!-- Id Card Front Part -->
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="print-size-front mt-2">
                    <div class="row">
                        <div class="col">
                            <div class="{{ $cardColor }}-idcard-wrapper ">
                                <div class="idcard-border">
                                    <div class="row">
                                        <div class="col-2"><img src="{{ asset('img/logo.png') }}" style="width: 80px;"></div>
                                        <div class="col-8">
                                            <div class="id-title">
                                             <h1>{{ $disable->user->name }}</h1>
                                             <p>नगर कार्यपालिकाको कार्यालयलय <br> </p>
                                                <h2>{{ $disable->disability_severity }} अपाङ्गताको परिचय-पत्र </h2>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="id-photo-frame">
                                                @if ($disable->image)
                                                    <img src="{{ asset('img/disable/'.$disable->image) }}" alt="" width="100" height="120">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="id-body">
                                        <div class="row">
                                            <div class="col">प. प. नं. <span class="input-padder">{{ $numberConverter->devanagari($disable->id) }}</span></div>
                                        </div>
                                        <div class="row">
                                            <div class="col">प. प. प्रकार: <span class="input-padder">{{ $nepaliType }}</span></div>
                                        </div>
                                        <div class="row">
                                            <div class="col">नाम थर: <span class="input-padder">{{ $disable->nep_name }}</span></div>
                                        </div>
                                        <div class="row">
                                            <div class="col">ठेगाना: जिल्ला {{ $disable->district }}, स्थानीय तह: {{ $disable->local_level }} वडा नं. <span class="input-padder">{{ $numberConverter->devanagari($disable->ward_no) }}</span></div>
                                        </div>
                                        <div class="row">
                                            <div class="col">जन्म मिति/उमेर: <span class="input-padder">{{ $disable->dob_nepali }}/{{ $numberConverter->devanagari($disable->age) }}</span></div>
                                            <div class="col">ना. प्रा. नं./जिल्ला: <span class="input-padder">{{ $disable->citizenship_no }}/{{ $disable->citizenship_issued_district }}</span></span></div>
        
                                        </div>
                                        <div class="row">
                                         <div class="col"> जारी मिति: <span class="input-padder">{{ $disable->citizenship_issued_date_nepali }}</span></div>
                                            <div class="col">लिङ्ग: <span class="input-padder">{{ $nepGender }}</span></div>
                                            <div class="col">रक्त समुह: <span class="input-padder">{{ $disable->blood_group }}</span></div>
                                        </div>
                                        <div class="row">
                                            <div class="col">अपाङ्गताको किसिम: प्रकृतिको आधारमा: <span class="input-padder">{{ $disable->disability_category }}</span></div>
                                            <div class="col-4">गम्भिरता: <span class="input-padder">{{ $disable->disability_severity }}</span></div>
                                        </div>
                                        <div class="row">
                                            <div class="col">बाबुआमा वा संरक्षकको नामथर: <span class="input-padder">{{ $disable->guardian_nep_name }}</span></div>
                                        </div>
                                        <div class="row">
                                            <div class="col">परिचय-पत्र बाहकको दस्तखत:</div>
                                            <div class="col">परिचय-पत्र प्रमाणित गर्ने:
                                                <div class="row">
                                                    <div class="col">हस्ताक्षर:</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">नामथर:</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">पद:</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">मिति:</div>
                                                </div>
                                            </div>
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
                            <div class="{{$cardColor}}-idcard-wrapper">
                                <div class="idcard-border">
                                    <div class="idcard-back">
                                        <div class="row">
                                            <div class="col">ID Card No: <span class="input-padder">{{$disable->id}}</span></div>
                                            <div class="col">ID Card Type: <span class="input-padder"> {{$engType}}</span></div>
                                        </div>
                                        <div class="row">
                                            <div class="col">1) Name of Id Holder: <span class="input-padder">{{ $disable->eng_name }}</span></div>
                                        </div>
                                        <div class="row">
                                            <div class="col">Address: District: {{ \App\District::firstWhere('nep_name', $disable->district)->eng_name }}, Local Level: {{ \App\LocalLevel::firstWhere('nep_name', $disable->local_level)->eng_name }} Ward No <span class="input-padder">{{ $disable->ward_no }}</span></div>
                                        </div>
                                        <div class="row no-gutters">
                                            <div class="col-5">Date of Birth/Age: <span class="input-padder">{{ $disable->dob_english }}/{{ $disable->age }}</span></div>
                                            <div class="col no-gutters">Citizenship No./District: <span class="input-padder">{{ $disable->citizenship_no }}/{{ \App\District::firstWhere('nep_name', $disable->citizenship_issued_district)->eng_name }}</span></div>
                                        </div>
                                        <div class="row">
                                            <div class="col">Issue Date: <span class="input-padder">{{ $disable->citizenship_issued_date_english }}</span></div>
                                            <div class="col">Sex: <span class="input-padder">{{ ucfirst($disable->gender) }}</span></div>
                                            <div class="col">Blood Group: <span class="input-padder">{{$disable->blood_group}}</span></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">Types of Disability:</div>
                                            <div class="col-8">
                                                <div class="row">
                                                <div class="col">On the basis of Nature: <span class="input-padder">{{$category}}</span></div>
                                            </div>
                                            <div class="row">
                                                <div class="col">On the basis of Severity: <span class="input-padder">{{$severity}}</span></div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">Father's Name/Mother's Name/ Name or Guardian: <span class="input-padder">{{$disable->guardian_eng_name}}</span></div>
                                        </div>
                                        <div class="row">
                                            <div class="col">Signature of ID Card Holder:</div>
                                            <div class="col">Approved By:</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6 mt-2">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="stamp-box">
                                                            <p>Right</p>
                                                            <div class="stamp-box-border"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="stamp-box">
                                                            <p>Left</p>
                                                            <div class="stamp-box-border"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <div class="col-6 mt-4">
                                        <div class="row">
                                            <div class="col mb-2">Signature:</div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-2">Name:</div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-2">Designation:</div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-2">Date:</div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                            <div class="col text-center mt-3 note">If somebody finds this ID card, Please deposit this in the nearby police station or municipality office.</div>
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
