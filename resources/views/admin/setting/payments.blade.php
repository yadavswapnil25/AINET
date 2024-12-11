@extends('admin.layouts.main')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active">Payments Methods</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Payments Methods <small></small></h3>
                        </div>
                        <form role="form" id="quickForm" method="POST"
                            action="{{ route('admin.setting.payment.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <center>
                                    <h4 class="divider-text">{{ __('Paypal Setting') }}</h4>
                                </center>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Paypal Business ID <span class="required"
                                                    style="color:red;">*</span></label>
                                            <input id="paypal_business_id" type="text"
                                                class="form-control @error('paypal_business_id') is-invalid @enderror"
                                                name="paypal_business_id" autocomplete="paypal_business_id" autofocus
                                                value="{{ system_setting('paypal_business_id') != '' ? system_setting('paypal_business_id') : '' }}"
                                                required="">
                                            @error('paypal_business_id')
                                                <span class="error invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="paypal_webhook_url">Paypal Webhook URL <span class="required"
                                                    style="color:red;">*</span></label>
                                            <input id="paypal_webhook_url" type="text"
                                                class="form-control @error('paypal_webhook_url') is-invalid @enderror"
                                                name="paypal_webhook_url" autocomplete="paypal_webhook_url" autofocus
                                                value="{{ system_setting('paypal_webhook_url') != '' ? system_setting('paypal_webhook_url') : url('/webhook/paypal') }}"
                                                required="">
                                            @error('paypal_webhook_url')
                                                <span class="error invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="customSwitch1"
                                                    value="{{ system_setting('sandbox_mode') != '' ? system_setting('sandbox_mode') : 0 }}">
                                                <label class="custom-control-label" for="customSwitch1"
                                                    {{ system_setting('sandbox_mode') == '1' ? 'checked' : '' }}>{{ __('Sandbox Mode') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="customSwitch2"
                                                    name="status"
                                                    value="{{ system_setting('paypal_gateway') != '' ? system_setting('paypal_gateway') : 0 }}">
                                                <label class="custom-control-label" for="customSwitch2" name="op"
                                                    {{ system_setting('paypal_gateway') == '1' ? 'checked' : '' }}>{{ __('Status') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                                <hr>
                                <br>
                                <center>
                                    <h4 class="divider-text">{{ __('Razorpay Setting') }}</h4>
                                </center>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">{{ __('Razorpay key') }} <span class="required"
                                                    style="color:red;">*</span></label>
                                            <input id="razor_key" type="text"
                                                class="form-control @error('razor_key') is-invalid @enderror"
                                                name="razor_key" autocomplete="razor_key" autofocus
                                                value="{{ system_setting('razor_key') != '' ? system_setting('razor_key') : '' }}"
                                                required="">
                                            @error('razor_key')
                                                <span class="error invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="razorpay_webhook_url">{{ __('Razorpay Webhook URL') }} <span
                                                    class="required" style="color:red;">*</span></label>
                                            <input id="razorpay_webhook_url" type="text"
                                                class="form-control @error('razorpay_webhook_url') is-invalid @enderror"
                                                name="razorpay_webhook_url" autocomplete="razorpay_webhook_url" autofocus
                                                value="{{ system_setting('razorpay_webhook_url') != '' ? system_setting('razorpay_webhook_url') : url('/webhook/razorpay') }}"
                                                required="">
                                            @error('razorpay_webhook_url')
                                                <span class="error invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="razor_secret">{{ __('Razorpay Secret') }} <span class="required"
                                                    style="color:red;">*</span></label>
                                            <input id="razor_secret" type="text"
                                                class="form-control @error('razor_secret') is-invalid @enderror"
                                                name="razor_secret"
                                                value="{{ system_setting('razor_secret') != '' ? system_setting('razor_secret') : '' }}"
                                                required="" autocomplete="razor_secret" autofocus>
                                            @error('razor_secret')
                                                <span class="error invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="custom-control custom-switch">
                                                <input type="hidden" name="razorpay_gateway" id="razorpay_gateway"
                                                    value="{{ system_setting('razorpay_gateway') != '' ? system_setting('razorpay_gateway') : 0 }}">
                                                <input type="checkbox" class="custom-control-input" id="customSwitch3"
                                                    name="op"
                                                    {{ system_setting('razorpay_gateway') == '1' ? 'checked' : '' }}>
                                                <label class="custom-control-label"
                                                    for="customSwitch3">{{ __('Status') }} <span class="required"
                                                        style="color:red;">*</span></label>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                                <hr>
                                <br>
                                <center>
                                    <h4 class="divider-text">{{ __('Paystack Setting') }}</h4>
                                </center>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">{{ __('Paystack Secret key') }} <span class="required"
                                                    style="color:red;">*</span></label>
                                            <input id="paystack_secret_key" type="text"
                                                class="form-control @error('paystack_secret_key') is-invalid @enderror"
                                                name="paystack_secret_key"
                                                value="{{ system_setting('paystack_secret_key') != '' ? system_setting('paystack_secret_key') : '' }}"
                                                required="" autocomplete="paystack_secret_key" autofocus>
                                            @error('paystack_secret_key')
                                                <span class="error invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="razorpay_webhook_url">{{ __('Razorpay Webhook URL') }} <span
                                                    class="required" style="color:red;">*</span></label>
                                            <input id="razorpay_webhook_url" type="text"
                                                class="form-control @error('razorpay_webhook_url') is-invalid @enderror"
                                                name="razorpay_webhook_url"
                                                value="{{ system_setting('paystack_webhook_url') != '' ? system_setting('paystack_webhook_url') : url('/webhook/paystack') }}"
                                                required="" autocomplete="razorpay_webhook_url" autofocus>
                                            @error('razorpay_webhook_url')
                                                <span class="error invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Paystack Currency Symbol <span class="required"
                                                    style="color:red;">*</span></label>
                                            <select id="role"
                                                class="form-control @error('role') is-invalid @enderror" name="role">
                                                <option value="GHS"
                                                    selected="{{ system_setting('paystack_currency') == 'GHS' ? 'true' : '' }}">
                                                    GHS</option>
                                                <option value="NGN"
                                                    selected="{{ system_setting('paystack_currency') == 'NGN' ? 'true' : '' }}">
                                                    NGN</option>
                                                <option value="USD"
                                                    selected="{{ system_setting('paystack_currency') == 'USD' ? 'true' : '' }}">
                                                    USD</option>
                                                <option value="ZAR"
                                                    selected="{{ system_setting('paystack_currency') == 'ZAR' ? 'true' : '' }}">
                                                    ZAR</option>
                                            </select>
                                            @error('role')
                                                <span class="error invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="paystack_public_key">{{ __('Paystack Public key') }} <span
                                                    class="required" style="color:red;">*</span></label>
                                            <input id="paystack_public_key" type="text"
                                                class="form-control @error('paystack_public_key') is-invalid @enderror"
                                                name="paystack_public_key" value="{{ system_setting('paystack_public_key') != '' ? system_setting('paystack_public_key') : '' }}"
                                required=""
                                                autocomplete="paystack_public_key" autofocus>
                                            @error('paystack_public_key')
                                                <span class="error invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="customSwitch3"
                                                    name="status" {{ system_setting('paystack_gateway') == '1' ? 'checked' : '' }}>
                                                <label class="custom-control-label"
                                                    for="customSwitch3">{{ __('Status') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                                <center>
                                    <h4 class="divider-text">{{ __('Stripe Setting') }}</h4>
                                </center>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">{{ __('Stripe publishable key') }} <span
                                                    class="required" style="color:red;">*</span></label>
                                            <input id="stripe_publishable_key" type="text"
                                                class="form-control @error('stripe_publishable_key') is-invalid @enderror"
                                                name="stripe_publishable_key"
                                                value="{{ system_setting('stripe_publishable_key') != '' ? system_setting('stripe_publishable_key') : '' }}"
                                required=""
                                                autocomplete="stripe_publishable_key" autofocus>
                                            @error('stripe_publishable_key')
                                                <span class="error invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="stripe_webhook_url">{{ __('Stripe Webhook URL') }} <span
                                                    class="required" style="color:red;">*</span></label>
                                            <input id="stripe_webhook_url" type="text"
                                                class="form-control @error('stripe_webhook_url') is-invalid @enderror"
                                                name="stripe_webhook_url"
                                                 value="{{ system_setting('stripe_webhook_url') != '' ? system_setting('stripe_webhook_url') : url('/webhook/stripe') }}"
                                required=""
                                                autocomplete="stripe_webhook_url" autofocus>
                                            @error('stripe_webhook_url')
                                                <span class="error invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Stripe Currency Symbol </label>
                                            <select id="role"
                                                class="form-control @error('role') is-invalid @enderror"
                                                name="stripe_currency">
                                                @foreach ($stripe_currencies as $value)
                                                    <option value={{ $value }}
                                                        {{ @$stripe_currency->data == $value ? 'selected' : '' }}>
                                                        {{ $value }}</option>
                                                @endforeach
                                            </select>
                                            @error('role')
                                                <span class="error invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="stripe_secret_key">{{ __('Stripe Secret key') }} </label>
                                            <input id="stripe_secret_key" type="text"
                                                class="form-control @error('stripe_secret_key') is-invalid @enderror"
                                                name="stripe_secret_key"
                                                value="{{ system_setting('stripe_secret_key') != '' ? system_setting('stripe_secret_key') : '' }}"
                                required=""
                                                autocomplete="stripe_secret_key" autofocus>
                                            @error('stripe_secret_key')
                                                <span class="error invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="custom-control custom-switch">
                                                  <input type="hidden" name="stripe_gateway" id="stripe_gateway"
                                    value="{{ system_setting('stripe_gateway') != '' ? system_setting('stripe_gateway') : 0 }}">
                                                <input type="checkbox" class="custom-control-input" id="customSwitch3"
                                                    name="status" {{ system_setting('stripe_gateway') == '1' ? 'checked' : '' }}>
                                                <label class="custom-control-label"
                                                    for="customSwitch3">{{ __('Status') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                                <hr>
                                <br>
                            </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Change Settings</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
