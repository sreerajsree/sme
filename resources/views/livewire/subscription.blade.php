@if (!session()->has('success'))
<section class="subscription">
    <div class="subscription-wrapper">
        <div class="subscription-info">
            <p>Expert Insights,</p>
            <p id="test">Latest Industry Happenings,</p>
            <p>Comprehensive SME Coverage, and Whatnot!</p>
            <p class="mt-4">Keep in the loop. Subscribe to our Newsletter.</p>
        </div>
        <div class="subscription-widget">
            <form class="input-wrapper" wire:submit.prevent="store">
                <div class="form-group">
                    <input id="subscription" wire:model.defer="email" type="email" placeholder="Your email" required />
                        <button type="submit" class="{{ $terms ? 'activeButton' : ''}}" wire:target="terms" {{ $terms ? '' : 'disabled'}}>
                            <svg xmlns="http://www.w3.org/2000/svg" class="envelope" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                            </svg>
                        </button>
                </div>
                <div class="invalid-feedback">
                    @error('email')
                    {{ $message }}
                    @enderror
                </div>
                <div class="policy-consent">
                    <label class="checkbox-container">
                        <input wire:model="terms" type="checkbox">
                            <span class="checkmark"></span>
                            <small>
                                By sending email you accept the <a href="/terms-and-conditions">Terms and Conditions</a> 
                                and <a href="/privacy-policy">Privacy Policy.</a>
                            </small>
                    </label>
                </div>
                @csrf
            </form>
            <a class="sub-mail" href="mailto:sales@smebusinessreview.com"><i class="bi bi-envelope"></i> sales@smebusinessreview.com</a>
        </div>
    </div>
</section>
@endif

@if (session()->has('success'))
<div class="flash">
    <div class="flash-wrapper">{{ session('success') }}</div>
</div>
@endif
