<div class="form-group row">
    @can('isAdmin')
        {{-- state filter --}}
        <div class="col-12 col-sm-6 col-md-3 my-2">
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
        <div class="col-12 col-sm-6 col-md-3 my-2">
            <select name="district" id="district" class="form-control select2">
                <option value="">-- जिल्ला छनौट गर्नुहोस् -- </option>
                @for ($i = 0; $i < count($districtNames); $i++)
                    <option value="{{ $districtNames[$i] }}">{{ $districtNames[$i] }}</option>
                @endfor
            </select>
        </div>

        {{-- local gov filter --}}
        <div class="col-12 col-sm-6 col-md-3 my-2">
            <select name="local_level" id="local_level" class="form-control select2">
                <option value="">-- स्थानिय तह छनौट गर्नुहोस् -- </option>
                @for ($i = 0; $i < count($localLevelNames); $i++)
                    <option value="{{ $localLevelNames[$i] }}">{{ $localLevelNames[$i] }}</option>
                @endfor
            </select>
        </div>
    @else
        <div class="col-12 col-sm-12 col-md-9 my-2">
            <div class="text-center">
                <span class="text-danger"><i>** केही फिल्टर विकल्पहरू प्रयोग गर्न प्रयोगकर्तालाई निषेध गरिएको छ |</i></span class="text-danger">
            </div>
        </div>
    @endcan

    {{-- local gov filter --}}
    <div class="col-12 col-sm-6 col-md-3 my-2">
        <select name="ward_no" id="ward_no" class="form-control select2">
            <option value="">-- वार्ड नम्बर छनौट गर्नुहोस् -- </option>
            @for ($i = 1; $i <= 25; $i++)
                <option value="{{ $i }}">{{ $numberConverter->devanagari($i) }}</option>
            @endfor
        </select>
    </div>

</div>

<div class="form-group row">

    {{-- disability category --}}
    <div class="col-12 col-sm-6 col-md-3 my-2">
        <select name="disability_category" id="disability_category" class="form-control select2">
            <option value="">-- अपाङ्गता प्रकृति छनौट गर्नुहोस् -- </option>
            <option value="शारीरिक अपाङ्गता">शारीरिक अपाङ्गता</option>
            <option value="पूर्ण दृस्टी बिहिन">पूर्ण दृस्टी बिहिन</option>
            <option value="स्वर बोलाई अपाङगता">स्वर बोलाई अपाङगता</option>
            <option value="बहिरा">बहिरा</option>
            <option value="वौद्धिक अपाङ्ग वा सुस्त मनस्थिति">वौद्धिक अपाङ्ग वा सुस्त मनस्थिति</option>
            <option value="अटिजम">अटिजम</option>
            <option value="होमोफेलिया">होमोफेलिया</option>
            <option value="मनो समाजीक अपाङ्गता">मनो समाजीक अपाङ्गता</option>
            <option value="वहु अपाङगता">वहु अपाङगता</option>
            <option value="दृस्टी बिहिन">दृस्टी बिहिन</option>
            <option value="न्युन दृस्टी बिहिन">न्युन दृस्टी बिहिन</option>
            <option value="सुस्त श्रवण">सुस्त श्रवण</option>
        </select>
    </div>

    {{-- disability severity --}}
    <div class="col-12 col-sm-6 col-md-3 my-2">
        <select name="disability_severity" id="disability_severity" class="form-control select2">
            <option value="">-- अपाङ्गता गम्भिरता छनौट गर्नुहोस् -- </option>
            <option value="पूर्ण">पूर्ण</option>
            <option value="अति असक्त">अति असक्त</option>
            <option value="मध्यम">मध्यम</option>
            <option value="सामान्य">सामान्य</option>
        </select>
    </div>

    <div class="col-12 col-sm-6 col-md-3 my-2">
        <button class="btn btn-block btn-success" type="submit">
            <i class="fas fa-filter fa-fw"></i> डाटा फिल्टर गर्नुहोस्
        </button>
    </div>

</div>
