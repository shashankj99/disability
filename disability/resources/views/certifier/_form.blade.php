<div class="row justify-content-center">
    <div class="col-12">

        <div class="form-group row">
            <label for="nep_name" class="col-md-4 col-form-label text-md-right">{{ __('प्रमाणित गर्ने व्यक्तीको पूरा नाम') }}</label>

            <div class="col-md-6">
                <input id="nep_name" type="text" class="form-control @error('nep_name') is-invalid @enderror" name="nep_name" @isset($certifier) value="{{ $certifier->nep_name }}" @else value="{{ old('nep_name') }}" @endisset required autocomplete="nep_name" autofocus placeholder="प्रमाणित गर्ने व्यक्तीको पूरा नाम लेख्नुहोस्">

                @error('nep_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="eng_name" class="col-md-4 col-form-label text-md-right">{{ __('Enter the full name of the certifier') }}</label>

            <div class="col-md-6">
                <input id="eng_name" type="text" class="form-control @error('eng_name') is-invalid @enderror" name="eng_name" @isset($certifier) value="{{ $certifier->eng_name }}" @else value="{{ old('eng_name') }}" @endisset placeholder="Enter the full name of the certifier">

                @error('eng_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="post_nepali" class="col-md-4 col-form-label text-md-right">{{ __('प्रमाणित गर्ने व्यक्तीको पद') }}</label>

            <div class="col-md-6">
                <input id="post_nepali" type="text" class="form-control @error('post_nepali') is-invalid @enderror" name="post_nepali" @isset($certifier) value="{{ $certifier->post_nepali }}" @else value="{{ old('post_nepali') }}" @endisset required autocomplete="post_nepali" placeholder="प्रमाणित गर्ने व्यक्तीको पद लेख्नुहोस्">

                @error('post_nepali')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="post_english" class="col-md-4 col-form-label text-md-right">{{ __('Enter the post of the certifier') }}</label>

            <div class="col-md-6">
                <input id="post_english" type="text" class="form-control @error('post_english') is-invalid @enderror" name="post_english" required autocomplete="new-post_english" placeholder="Enter the post of the certifier" @isset($certifier) value="{{ $certifier->post_english }}" @else value="{{ old('post_english') }}" @endisset>

                @error('post_english')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-plus-circle"></i> {{ $buttonText }}
                </button>
            </div>
        </div>

    </div>
</div>