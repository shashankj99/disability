@can('isAdmin')
<div class="form-group row">
    {{-- state filter --}}
    <div class="col-12 col-sm-6 col-md-4 my-2">
        <select name="state" id="state" class="form-control select2">
            <option value="">-- प्रदेश छनौट गर्नुहोस् -- </option>
            <option value="प्रदेश १">प्रदेश १</option>
            <option value="प्रदेश २">प्रदेश २</option>
            <option value="बागमती प्रदेश">बागमती प्रदेश</option>
            <option value="गण्डकी प्रदेश">गण्डकी प्रदेश</option>
            <option value="प्रदेश ५">प्रदेश ५</option>
            <option value="कर्नाली प्रदेश">कर्नाली प्रदेश</option>
            <option value="सुदुरपस्चिम प्रदेश">सुदुरपस्चिम प्रदेश</option>
        </select>
    </div>

    {{-- district filter --}}
    <div class="col-12 col-sm-6 col-md-4 my-2">
        <select name="district" id="district" class="form-control select2">
            <option value="">-- जिल्ला छनौट गर्नुहोस् -- </option>
            @for ($i = 0; $i < count($districtNames); $i++)
                <option value="{{ $districtNames[$i] }}">{{ $districtNames[$i] }}</option>
            @endfor
        </select>
    </div>

    {{-- local gov filter --}}
    <div class="col-12 col-sm-6 col-md-4 my-2">
        <select name="local_level" id="local_level" class="form-control select2">
            <option value="">-- स्थानिय तह छनौट गर्नुहोस् -- </option>
            @for ($i = 0; $i < count($localLevelNames); $i++)
                <option value="{{ $localLevelNames[$i] }}">{{ $localLevelNames[$i] }}</option>
            @endfor
        </select>
    </div>

</div>
<div class="form-group row">
    {{-- ward number filter --}}
    <div class="col-12 col-sm-6 col-md-4 my-2">
        <select name="ward_no" id="ward_no" class="form-control select2">
            <option value="">-- वार्ड नम्बर छनौट गर्नुहोस् -- </option>
            @for ($i = 1; $i <= 25; $i++)
                <option value="{{ $i }}">{{ $numberConverter->devanagari($i) }}</option>
            @endfor
        </select>
    </div>

    {{-- gender --}}
    <div class="col-12 col-sm-6 col-md-4 my-2">
        <select name="gender" id="gender" class="form-control select2">
            <option value="">-- लिङ्ग छनौट गर्नुहोस् -- </option>
            <option value="male">पुरुष</option>
            <option value="female">महिला</option>
            <option value="other">तेस्रो लिङ्गी</option>
        </select>
    </div>

    <div class="col-12 col-sm-6 col-md-4 my-2">
        <button class="btn btn-block btn-success" type="submit">
            <i class="fas fa-filter fa-fw"></i> डाटा फिल्टर गर्नुहोस्
        </button>
    </div>
</div>
@else
<div class="form-group row">
    
    {{-- ward number filter --}}
    <div class="col-12 col-sm-6 col-md-4 my-2">
        <select name="ward_no" id="ward_no" class="form-control select2">
            <option value="">-- वार्ड नम्बर छनौट गर्नुहोस् -- </option>
            @for ($i = 1; $i <= 25; $i++)
                <option value="{{ $i }}">{{ $numberConverter->devanagari($i) }}</option>
            @endfor
        </select>
    </div>

    {{-- gender --}}
    <div class="col-12 col-sm-6 col-md-4 my-2">
        <select name="gender" id="gender" class="form-control select2">
            <option value="">-- लिङ्ग छनौट गर्नुहोस् -- </option>
            <option value="male">पुरुष</option>
            <option value="female">महिला</option>
            <option value="other">तेस्रो लिङ्गी</option>
        </select>
    </div>

    <div class="col-12 col-sm-6 col-md-4 my-2">
        <button class="btn btn-block btn-success" type="submit">
            <i class="fas fa-filter fa-fw"></i> डाटा फिल्टर गर्नुहोस्
        </button>
    </div>

</div>
@endcan
