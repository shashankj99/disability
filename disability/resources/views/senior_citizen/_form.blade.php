<div class="row">
    <div class="col-12 my-3">
        <h4>सामान्य परिचय</h4>
    </div>
</div>

<div class="form-group row">
    <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('व्यक्तिको पूरा नाम, थर') }}</label>

    <div class="col-md-4">
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" @isset($seniorCitizen) value="{{ $seniorCitizen->name }}" @else value="{{ old('name') }}" @endisset required autocomplete="name" autofocus placeholder="व्यक्तिको पूरा नाम, थर लेख्नुहोस्">

        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <label for="locality" class="col-md-2 col-form-label text-md-right">{{ __('व्यक्तिको टोल/गाउँ') }}</label>

    <div class="col-md-4">
        <input id="locality" type="text" class="form-control @error('locality') is-invalid @enderror" name="locality" @isset($seniorCitizen) value="{{ $seniorCitizen->locality }}" @else value="{{ old('locality') }}" @endisset required autocomplete="locality" autofocus placeholder="व्यक्तिको टोल/गाउँ लेख्नुहोस्">

        @error('locality')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    
</div>

<div class="form-group row">

    <label for="dob_nepali" class="col-md-1 col-form-label text-md-right">{{ __('जन्म मिति') }}</label>

    <div class="col-md-2">
        <input id="nepaliDate4" type="text" class="form-control @error('dob_nepali') is-invalid @enderror" name="dob_nepali" @isset($seniorCitizen) value="{{ $seniorCitizen->dob_nepali }}" @else value="{{ old('dob_nepali') }}" @endisset required autocomplete="dob_nepali" autofocus placeholder="yyyy-mm-dd">

        @error('dob_nepali')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <label for="dob_english" class="col-md-1 col-form-label text-md-right">{{ __('Date Of Birth') }}</label>

    <div class="col-md-2">
        <input id="dob_english" type="date" class="form-control @error('dob_english') is-invalid @enderror" name="dob_english" @isset($seniorCitizen) value="{{ $seniorCitizen->dob_english }}" @else value="{{ old('dob_english') }}" @endisset required autocomplete="dob_english" autofocus placeholder="mm/dd/yyy">

        @error('dob_english')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="col-md-2">
        <input id="age" type="number" class="form-control @error('age') is-invalid @enderror" name="age" @isset($seniorCitizen) value="{{ $seniorCitizen->age }}" @else value="{{ old('age') }}" @endisset required autocomplete="age" autofocus placeholder="उमेर" min="1">

        @error('age')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="col-md-2">
        <select name="gender" id="gender" class="form-control select2 @error('gender') is-invalid @enderror" required>
            <option value="">-- लिङ्ग छनौट गर्नुहोस् -- </option>
            <option value="male" {{ ($seniorCitizen->gender == "male") ? "selected" : "" }}>पुरुष</option>
            <option value="female" {{ ($seniorCitizen->gender == "female") ? "selected" : "" }}>महिला</option>
            <option value="other" {{ ($seniorCitizen->gender == "other") ? "selected" : "" }}>तेस्रो लिङ्गी</option>
        </select>

        @error('gender')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="col-md-2">
        <select name="blood_group" id="blood_group" class="form-control select2 @error('blood_group') is-invalid @enderror" required>
            <option value="">-- रक्त समूह छनौट गर्नुहोस् -- </option>
            <option value="A+" {{ ($seniorCitizen->blood_group == "A+") ? "selected" : "" }}>A+</option>
            <option value="A-" {{ ($seniorCitizen->blood_group == "A-") ? "selected" : "" }}>A-</option>
            <option value="B+" {{ ($seniorCitizen->blood_group == "B+") ? "selected" : "" }}>B+</option>
            <option value="B-" {{ ($seniorCitizen->blood_group == "B-") ? "selected" : "" }}>B-</option>
            <option value="AB+" {{ ($seniorCitizen->blood_group == "AB+") ? "selected" : "" }}>AB+</option>
            <option value="AB-" {{ ($seniorCitizen->blood_group == "AB-") ? "selected" : "" }}>AB-</option>
            <option value="O+" {{ ($seniorCitizen->blood_group == "O+") ? "selected" : "" }}>O+</option>
            <option value="O-" {{ ($seniorCitizen->blood_group == "O-") ? "selected" : "" }}>O-</option>
        </select>

        @error('blood_group')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

</div>

<div class="row">
    <div class="col-12 my-3">
        <h4>ठेगाना विवरण</h4>
    </div>
</div>

<div class="form-group row">

    <div class="col-md-3">
        <select name="state" id="state" class="form-control select2 @error('state') is-invalid @enderror" required>
            <option value="">-- प्रदेश छनौट गर्नुहोस् -- </option>
            <option value="प्रदेश १" {{ ($seniorCitizen->state == "प्रदेश १") ? "selected" : "" }}>प्रदेश १</option>
            <option value="प्रदेश २" {{ ($seniorCitizen->state == "प्रदेश २") ? "selected" : "" }}>प्रदेश २</option>
            <option value="बागमती प्रदेश" {{ ($seniorCitizen->state == "बागमती प्रदेश") ? "selected" : "" }}>बागमती प्रदेश</option>
            <option value="गण्डकी प्रदेश" {{ ($seniorCitizen->state == "गण्डकी प्रदेश") ? "selected" : "" }}>गण्डकी प्रदेश</option>
            <option value="प्रदेश ५" {{ ($seniorCitizen->state == "प्रदेश ५") ? "selected" : "" }}>प्रदेश ५</option>
            <option value="कर्नाली प्रदेश" {{ ($seniorCitizen->state == "कर्नाली प्रदेश") ? "selected" : "" }}>कर्नाली प्रदेश</option>
            <option value="सुदुरपस्चिम प्रदेश" {{ ($seniorCitizen->state == "सुदुरपस्चिम प्रदेश") ? "selected" : "" }}>सुदुरपस्चिम प्रदेश</option>
        </select>

        @error('state')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="col-md-3">
        <select name="district" id="district" class="form-control select2 @error('district') is-invalid @enderror" required>
            <option value="">-- जिल्ला छनौट गर्नुहोस् -- </option>
            @for ($i = 0; $i < count($districtNames); $i++)
                <option value="{{ $districtNames[$i] }}" {{ ($seniorCitizen->district == $districtNames[$i]) ? "selected" : ""}}>{{ $districtNames[$i] }}</option>
            @endfor
        </select>

        @error('district')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="col-md-3">
        <select name="local_level" id="local_level" class="form-control select2 @error('local_level') is-invalid @enderror" required>
            <option value="">-- स्थानिय तह छनौट गर्नुहोस् -- </option>
            @for ($i = 0; $i < count($localLevelNames); $i++)
                <option value="{{ $localLevelNames[$i] }}" {{ ($seniorCitizen->local_level == $localLevelNames[$i]) ? "selected" : ""}}>{{ $localLevelNames[$i] }}</option>
            @endfor
        </select>

        @error('local_level')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="col-md-3">
        <select name="ward_no" id="ward_no" class="form-control select2 @error('ward_no') is-invalid @enderror" required>
            <option value="">-- वार्ड नम्बर छनौट गर्नुहोस् -- </option>
            @for ($i = 1; $i <= 25; $i++)
                <option value="{{ $i }}" {{ ($seniorCitizen->ward_no == $i) ? "selected" : ""}}>{{ $numberConverter->devanagari($i) }}</option>
            @endfor
        </select>

        @error('ward_no')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

</div>

<div class="row">
    <div class="col-12 my-3">
        <h4>नागरिकता विवरण</h4>
    </div>
</div>

<div class="form-group row">

    <div class="col-md-3">
        <input id="citizenship_no" type="text" class="form-control @error('citizenship_no') is-invalid @enderror" name="citizenship_no" @isset($seniorCitizen) value="{{ $seniorCitizen->citizenship_no }}" @else value="{{ old('citizenship_no') }}" @endisset required autocomplete="citizenship_no" autofocus placeholder="ना.प्रा.नं लेख्नुहोस्">

        @error('citizenship_no')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="col-md-3">
        <select name="citizenship_issued_district" id="citizenship_issued_district" class="form-control select2 @error('citizenship_issued_district') is-invalid @enderror" required>
            <option value="">ना.प्रा. जारी जिल्ला छनौट गर्नुहोस्</option>
            @for ($i = 0; $i < count($districtNames); $i++)
                <option value="{{ $districtNames[$i] }}" {{ ($seniorCitizen->citizenship_issued_district == $districtNames[$i]) ? "selected" : ""}}>{{ $districtNames[$i] }}</option>
            @endfor
        </select>

        @error('citizenship_issued_district')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <label for="citizenship_issued_date_nepali" class="col-md-1 col-form-label text-md-right">{{ __('जारी मिति') }}</label>

    <div class="col-md-2">
        <input id="nepaliDate5" type="text" class="form-control @error('citizenship_issued_date_nepali') is-invalid @enderror" name="citizenship_issued_date_nepali" @isset($seniorCitizen) value="{{ $seniorCitizen->citizenship_issued_date_nepali }}" @else value="{{ old('citizenship_issued_date_nepali') }}" @endisset required autocomplete="citizenship_issued_date_nepali" autofocus placeholder="yyyy-mm-dd">

        @error('citizenship_issued_date_nepali')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <label for="citizenship_issued_date_english" class="col-md-1 col-form-label text-md-right">{{ __('Issued Date') }}</label>

    <div class="col-md-2">
        <input id="citizenship_issued_date_english" type="date" class="form-control @error('citizenship_issued_date_english') is-invalid @enderror" name="citizenship_issued_date_english" @isset($seniorCitizen) value="{{ $seniorCitizen->citizenship_issued_date_english }}" @else value="{{ old('citizenship_issued_date_english') }}" @endisset required autocomplete="citizenship_issued_date_english" autofocus placeholder="mm/dd/yyy">

        @error('citizenship_issued_date_english')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

</div>

<div class="row">
    <div class="col-12 my-3">
        <h4>अन्य विवरण</h4>
    </div>
</div>

<div class="form-group row">
    <label for="spouse_name" class="col-md-2 col-form-label text-md-right">{{ __('पति/पत्नीको नाम') }}</label>

    <div class="col-md-4">
        <input id="spouse_name" type="text" class="form-control @error('spouse_name') is-invalid @enderror" name="spouse_name" @isset($seniorCitizen) value="{{ $seniorCitizen->spouse_name }}" @else value="{{ old('spouse_name') }}" @endisset autocomplete="spouse_name" autofocus placeholder="पति/पत्नीको नाम लेख्नुहोस्">

        @error('spouse_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <label for="facilities" class="col-md-2 col-form-label text-md-right">{{ __('उपलब्ध छुट तथा सुविधाहरु') }}</label>

    <div class="col-md-4">
        <input id="facilities" type="text" class="form-control @error('facilities') is-invalid @enderror" name="facilities" @isset($seniorCitizen) value="{{ $seniorCitizen->facilities }}" @else value="{{ old('facilities') }}" @endisset autocomplete="facilities" autofocus placeholder="उपलब्ध छुट तथा सुविधाहरु">

        @error('facilities')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    
</div>

<div class="form-group row">
    <label for="contact_person_name" class="col-md-2 col-form-label text-md-right">{{ __('सम्पर्क गर्नुपर्ने व्यक्तिको नाम') }}</label>

    <div class="col-md-4">
        <input id="contact_person_name" type="text" class="form-control @error('contact_person_name') is-invalid @enderror" name="contact_person_name" @isset($seniorCitizen) value="{{ $seniorCitizen->contact_person_name }}" @else value="{{ old('contact_person_name') }}" @endisset required autocomplete="contact_person_name" autofocus placeholder="सम्पर्क गर्नुपर्ने व्यक्तिको नाम लेख्नुहोस्">

        @error('contact_person_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <label for="contact_person_address" class="col-md-2 col-form-label text-md-right">{{ __('सम्पर्क गर्नुपर्ने व्यक्तिको ठेगाना') }}</label>

    <div class="col-md-4">
        <input id="contact_person_address" type="text" class="form-control @error('contact_person_address') is-invalid @enderror" name="contact_person_address" @isset($seniorCitizen) value="{{ $seniorCitizen->contact_person_address }}" @else value="{{ old('contact_person_address') }}" @endisset required autocomplete="contact_person_address" autofocus placeholder="सम्पर्क गर्नुपर्ने व्यक्तिको ठेगाना">

        @error('contact_person_address')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    
</div>

<div class="form-group row">
    <label for="certificate_no" class="col-md-2 col-form-label text-md-right">{{ __('अपाङ्गता प्रमाणपत्र भए प्रमाणपत्र नं') }}</label>

    <div class="col-md-4">
        <input id="certificate_no" type="text" class="form-control @error('certificate_no') is-invalid @enderror" name="certificate_no" @isset($seniorCitizen) value="{{ $seniorCitizen->certificate_no }}" @else value="{{ old('certificate_no') }}" @endisset autocomplete="certificate_no" autofocus placeholder="अपाङ्गता प्रमाणपत्र भए प्रमाणपत्र नं लेख्नुहोस्">

        @error('certificate_no')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <label for="home_care_name" class="col-md-2 col-form-label text-md-right">{{ __('हेरचाह केन्द्रमा बसेको भए सो को नाम') }}</label>

    <div class="col-md-4">
        <input id="home_care_name" type="text" class="form-control @error('home_care_name') is-invalid @enderror" name="home_care_name" @isset($seniorCitizen) value="{{ $seniorCitizen->home_care_name }}" @else value="{{ old('home_care_name') }}" @endisset autocomplete="home_care_name" autofocus placeholder="हेरचाह केन्द्रमा बसेको भए सो को नाम">

        @error('home_care_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    
</div>

<div class="form-group row">
    <label for="disease" class="col-md-2 col-form-label text-md-right">{{ __('रोग भए रोगको नाम') }}</label>

    <div class="col-md-4">
        <input id="disease" type="text" class="form-control @error('disease') is-invalid @enderror" name="disease" @isset($seniorCitizen) value="{{ $seniorCitizen->disease }}" @else value="{{ old('disease') }}" @endisset autocomplete="disease" autofocus placeholder="रोग भए रोगको नाम लेख्नुहोस्">

        @error('disease')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <label for="medicine" class="col-md-2 col-form-label text-md-right">{{ __('सेवन गरिएको औषधि') }}</label>

    <div class="col-md-4">
        <input id="medicine" type="text" class="form-control @error('medicine') is-invalid @enderror" name="medicine" @isset($seniorCitizen) value="{{ $seniorCitizen->medicine }}" @else value="{{ old('medicine') }}" @endisset autocomplete="medicine" autofocus placeholder="सेवन गरिएको औषधि">

        @error('medicine')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    
</div>

<div class="form-group row">
    <label for="image" class="col-md-2 col-form-label text-md-right">{{ __('फोटो') }}</label>

    <div class="col-md-4">
        <input type="file" name="image" id="image">
    </div>
</div>

@isset($seniorCitizen)
    <input type="hidden" name="old_image" id="old_image" value="{{ $seniorCitizen->image }}">
@endisset

<div class="row">
    <div class="col-12 my-3">
        <div class="text-center">
            <button type="submit" class="btn btn-success">
                <i class="fas fa-check fa-fw"></i> {{ $buttonText }}
            </button>
        </div>
    </div>
</div>
