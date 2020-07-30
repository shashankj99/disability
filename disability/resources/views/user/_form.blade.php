<div class="row justify-content-center">
    <div class="col-12">

        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('प्रयोगकर्ताको पूरा नाम') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" @isset($user) value="{{ $user->name }}" @else value="{{ old('name') }}" @endisset required autocomplete="name" autofocus placeholder="प्रयोगकर्ताको पूरा नाम लेख्नुहोस्">

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('प्रयोगकर्ताको ठेगाना') }}</label>

            <div class="col-md-6">
                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" @isset($user) value="{{ $user->address }}" @else value="{{ old('address') }}" @endisset required autocomplete="address" autofocus placeholder="प्रयोगकर्ताको ठेगाना लेख्नुहोस्">

                @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('प्रयोगकर्ताको सम्पर्क नम्बर') }}</label>

            <div class="col-md-6">
                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" @isset($user) value="{{ $user->phone }}" @else value="{{ old('phone') }}" @endisset pattern="[1-9]{1}[0-9]{9}" placeholder="प्रयोगकर्ताको सम्पर्क नम्बर लेख्नुहोस्">

                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('प्रयोगकर्ताको इ-मेल ठेगाना') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" @isset($user) value="{{ $user->email }}" @else value="{{ old('email') }}" @endisset required autocomplete="email" placeholder="प्रयोगकर्ताको इ-मेल ठेगाना लेख्नुहोस्">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('प्रयोगकर्ताको पासवर्ड') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" {{ (!isset($user)) ? "required" : "" }} autocomplete="new-password" placeholder="प्रयोगकर्ताको पासवर्ड टाइप गर्नुहोस्">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('पासवर्ड सुनिश्चित गर्नुहोस') }}</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" {{ (!isset($user)) ? "required" : "" }} autocomplete="new-password" placeholder="प्रयोगकर्ताको पासवर्ड पुनःटाइप गर्नुहोस्">
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