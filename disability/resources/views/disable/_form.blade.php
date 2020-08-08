<div class="row">
    <div class="col-12 my-3">
        <h4>सामान्य परिचय</h4>
    </div>
</div>

<div class="form-group row">
    <label for="nep_name" class="col-md-2 col-form-label text-md-right">{{ __('व्यक्तिको पूरा नाम, थर') }}</label>

    <div class="col-md-4">
        <input id="nep_name" type="text" class="form-control @error('nep_name') is-invalid @enderror" name="nep_name" @isset($disable) value="{{ $disable->nep_name }}" @else value="{{ old('nep_name') }}" @endisset required autocomplete="nep_name" autofocus placeholder="व्यक्तिको पूरा नाम, थर लेख्नुहोस्">

        @error('nep_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <label for="eng_name" class="col-md-2 col-form-label text-md-right">{{ __('Full Name, Surname') }}</label>

    <div class="col-md-4">
        <input id="eng_name" type="text" class="form-control @error('eng_name') is-invalid @enderror" name="eng_name" @isset($disable) value="{{ $disable->eng_name }}" @else value="{{ old('eng_name') }}" @endisset required autocomplete="eng_name" autofocus placeholder="Enter Full Name of the Person">

        @error('eng_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    
</div>

<div class="form-group row">

    <label for="dob_nepali" class="col-md-1 col-form-label text-md-right">{{ __('जन्म मिति') }}</label>

    <div class="col-md-2">
        <input id="nepaliDate4" type="text" class="form-control @error('dob_nepali') is-invalid @enderror" name="dob_nepali" @isset($disable) value="{{ $disable->dob_nepali }}" @else value="{{ old('dob_nepali') }}" @endisset required autocomplete="dob_nepali" autofocus placeholder="yyyy-mm-dd">

        @error('dob_nepali')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <label for="dob_english" class="col-md-1 col-form-label text-md-right">{{ __('Date Of Birth') }}</label>

    <div class="col-md-2">
        <input id="dob_english" type="date" class="form-control @error('dob_english') is-invalid @enderror" name="dob_english" @isset($disable) value="{{ $disable->dob_english }}" @else value="{{ old('dob_english') }}" @endisset required autocomplete="dob_english" autofocus placeholder="mm/dd/yyy">

        @error('dob_english')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="col-md-2">
        <input id="age" type="number" class="form-control @error('age') is-invalid @enderror" name="age" @isset($disable) value="{{ $disable->age }}" @else value="{{ old('age') }}" @endisset required autocomplete="age" autofocus placeholder="उमेर" min="1">

        @error('age')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="col-md-2">
        <select name="gender" id="gender" class="form-control select2 @error('gender') is-invalid @enderror" required>
            <option value="">-- लिङ्ग छनौट गर्नुहोस् -- </option>
            <option value="male" {{ ($disable->gender == "male") ? "selected" : "" }}>पुरुष</option>
            <option value="female" {{ ($disable->gender == "female") ? "selected" : "" }}>महिला</option>
            <option value="other" {{ ($disable->gender == "other") ? "selected" : "" }}>तेस्रो लिङ्गी</option>
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
            <option value="A+" {{ ($disable->blood_group == "A+") ? "selected" : "" }}>A+</option>
            <option value="A-" {{ ($disable->blood_group == "A-") ? "selected" : "" }}>A-</option>
            <option value="B+" {{ ($disable->blood_group == "B+") ? "selected" : "" }}>B+</option>
            <option value="B-" {{ ($disable->blood_group == "B-") ? "selected" : "" }}>B-</option>
            <option value="AB+" {{ ($disable->blood_group == "AB+") ? "selected" : "" }}>AB+</option>
            <option value="AB-" {{ ($disable->blood_group == "AB-") ? "selected" : "" }}>AB-</option>
            <option value="O+" {{ ($disable->blood_group == "O+") ? "selected" : "" }}>O+</option>
            <option value="O-" {{ ($disable->blood_group == "O-") ? "selected" : "" }}>O-</option>
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
            <option value="प्रदेश १" {{ ($disable->state == "प्रदेश १") ? "selected" : "" }}>प्रदेश १</option>
            <option value="प्रदेश २" {{ ($disable->state == "प्रदेश २") ? "selected" : "" }}>प्रदेश २</option>
            <option value="बागमती प्रदेश" {{ ($disable->state == "बागमती प्रदेश") ? "selected" : "" }}>बागमती प्रदेश</option>
            <option value="गण्डकी प्रदेश" {{ ($disable->state == "गण्डकी प्रदेश") ? "selected" : "" }}>गण्डकी प्रदेश</option>
            <option value="प्रदेश ५" {{ ($disable->state == "प्रदेश ५") ? "selected" : "" }}>प्रदेश ५</option>
            <option value="कर्नाली प्रदेश" {{ ($disable->state == "कर्नाली प्रदेश") ? "selected" : "" }}>कर्नाली प्रदेश</option>
            <option value="सुदुरपस्चिम प्रदेश" {{ ($disable->state == "सुदुरपस्चिम प्रदेश") ? "selected" : "" }}>सुदुरपस्चिम प्रदेश</option>
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
                <option value="{{ $districtNames[$i] }}" {{ ($disable->district == $districtNames[$i]) ? "selected" : ""}}>{{ $districtNames[$i] }}</option>
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
                <option value="{{ $localLevelNames[$i] }}" {{ ($disable->local_level == $localLevelNames[$i]) ? "selected" : ""}}>{{ $localLevelNames[$i] }}</option>
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
                <option value="{{ $i }}" {{ ($disable->ward_no == $i) ? "selected" : ""}}>{{ $numberConverter->devanagari($i) }}</option>
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
        <h4>संरक्षकको परिचय</h4>
    </div>
</div>

<div class="form-group row">
    <label for="guardian_nep_name" class="col-md-2 col-form-label text-md-right">{{ __('बाबुआमा वा संरक्षकको नाम') }}</label>

    <div class="col-md-4">
        <input id="guardian_nep_name" type="text" class="form-control @error('guardian_nep_name') is-invalid @enderror" name="guardian_nep_name" @isset($disable) value="{{ $disable->guardian_nep_name }}" @else value="{{ old('guardian_nep_name') }}" @endisset required autocomplete="guardian_nep_name" autofocus placeholder="बाबुआमा वा संरक्षकको नाम लेख्नुहोस्">

        @error('guardian_nep_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <label for="guardian_eng_name" class="col-md-2 col-form-label text-md-right">{{ __('Father / Mother / Guardian Name') }}</label>

    <div class="col-md-4">
        <input id="guardian_eng_name" type="text" class="form-control @error('guardian_eng_name') is-invalid @enderror" name="guardian_eng_name" @isset($disable) value="{{ $disable->guardian_eng_name }}" @else value="{{ old('guardian_eng_name') }}" @endisset required autocomplete="guardian_eng_name" autofocus placeholder="Enter father / mother / guardian name">

        @error('guardian_eng_name')
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
        <input id="citizenship_no" type="text" class="form-control @error('citizenship_no') is-invalid @enderror" name="citizenship_no" @isset($disable) value="{{ $disable->citizenship_no }}" @else value="{{ old('citizenship_no') }}" @endisset required autocomplete="citizenship_no" autofocus placeholder="ना.प्रा.नं लेख्नुहोस्">

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
                <option value="{{ $districtNames[$i] }}" {{ ($disable->citizenship_issued_district == $districtNames[$i]) ? "selected" : ""}}>{{ $districtNames[$i] }}</option>
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
        <input id="nepaliDate5" type="text" class="form-control @error('citizenship_issued_date_nepali') is-invalid @enderror" name="citizenship_issued_date_nepali" @isset($disable) value="{{ $disable->citizenship_issued_date_nepali }}" @else value="{{ old('citizenship_issued_date_nepali') }}" @endisset required autocomplete="citizenship_issued_date_nepali" autofocus placeholder="yyyy-mm-dd">

        @error('citizenship_issued_date_nepali')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <label for="citizenship_issued_date_english" class="col-md-1 col-form-label text-md-right">{{ __('Issued Date') }}</label>

    <div class="col-md-2">
        <input id="citizenship_issued_date_english" type="date" class="form-control @error('citizenship_issued_date_english') is-invalid @enderror" name="citizenship_issued_date_english" @isset($disable) value="{{ $disable->citizenship_issued_date_english }}" @else value="{{ old('citizenship_issued_date_english') }}" @endisset required autocomplete="citizenship_issued_date_english" autofocus placeholder="mm/dd/yyy">

        @error('citizenship_issued_date_english')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

</div>

<div class="row">
    <div class="col-12 my-3">
        <h4>अपाङ्गताको विवरण</h4>
    </div>
</div>

<div class="form-group row">

    <label for="disability_category" class="col-md-1 col-form-label text-md-right">{{ __('प्रकृतिको आधारमा') }}</label>

    <div class="col-md-3">
        <select name="disability_category" id="disability_category" class="form-control select2 @error('disability_category') is-invalid @enderror" required>
            <option value="">-- अपाङ्गता प्रकृति छनौट गर्नुहोस् -- </option>
            <option value="शारीरिक अपाङ्गता" {{ ($disable->disability_category == "शारीरिक अपाङ्गता") ? "selected" : "" }}>शारीरिक अपाङ्गता</option>
            <option value="स्वर बोलाई अपाङगता" {{ ($disable->disability_category == "स्वर बोलाई अपाङगता") ? "selected" : "" }}>स्वर बोलाई अपाङगता</option>
            <option value="बहिरा" {{ ($disable->disability_category == "बहिरा") ? "selected" : "" }}>बहिरा</option>
            <option value="वौद्धिक अपाङ्ग वा सुस्त मनस्थिति" {{ ($disable->disability_category == "वौद्धिक अपाङ्ग वा सुस्त मनस्थिति") ? "selected" : "" }}>वौद्धिक अपाङ्ग वा सुस्त मनस्थिति</option>
            <option value="अटिजम" {{ ($disable->disability_category == "अटिजम") ? "selected" : "" }}>अटिजम</option>
            <option value="होमोफेलिया" {{ ($disable->disability_category == "होमोफेलिया") ? "selected" : "" }}>होमोफेलिया</option>
            <option value="मनो समाजीक अपाङ्गता" {{ ($disable->disability_category == "मनो समाजीक अपाङ्गता") ? "selected" : "" }}>मनो समाजीक अपाङ्गता</option>
            <option value="वहु अपाङगता" {{ ($disable->disability_category == "वहु अपाङगता") ? "selected" : "" }}>वहु अपाङगता</option>
            <option value="पूर्ण दृस्टी बिहिन" {{ ($disable->disability_category == "पूर्ण दृस्टी बिहिन") ? "selected" : "" }}>पूर्ण दृस्टी बिहिन</option>
            <option value="दृस्टी बिहिन" {{ ($disable->disability_category == "दृस्टी बिहिन") ? "selected" : "" }}>दृस्टी बिहिन</option>
            <option value="न्युन दृस्टी बिहिन" {{ ($disable->disability_category == "न्युन दृस्टी बिहिन") ? "selected" : "" }}>न्युन दृस्टी बिहिन</option>
            <option value="सुस्त श्रवण" {{ ($disable->disability_category == "सुस्त श्रवण") ? "selected" : "" }}>सुस्त श्रवण</option>
        </select>
    
        @error('disability_category')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <label for="disability_severity" class="col-md-1 col-form-label text-md-right">{{ __('गम्भिरताको आधारमा') }}</label>

    <div class="col-md-3">
        <select name="disability_severity" id="disability_severity" class="form-control select2 @error('disability_severity') is-invalid @enderror" required>
            <option value="">-- अपाङ्गता गम्भिरता छनौट गर्नुहोस् -- </option>
            <option value="पूर्ण" {{ ($disable->disability_severity == "पूर्ण") ? "selected" : "" }}>पूर्ण</option>
            <option value="अति असक्त" {{ ($disable->disability_severity == "अति असक्त") ? "selected" : "" }}>अति असक्त</option>
            <option value="मध्यम" {{ ($disable->disability_severity == "मध्यम") ? "selected" : "" }}>मध्यम</option>
            <option value="सामान्य" {{ ($disable->disability_severity == "सामान्य") ? "selected" : "" }}>सामान्य</option>
        </select>
    
        @error('disability_severity')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <label for="image" class="col-md-1 col-form-label text-md-right">{{ __('फोटो') }}</label>

    <div class="col-md-3">
        <input type="file" name="image" id="image">
    </div>

</div>

@isset($disable)
    <input type="hidden" name="old_image" id="old_image" value="{{ $disable->image }}">
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
