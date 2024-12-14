@extends('layouts.app')
@section('content')
    <div class="all-title-box"
        style="background: url('images/ainet-logo-fb.png');background-size: contain;
                                background-repeat: no-repeat;
                                background-position: center;">
        <div class="container text-center">
            <h1 class="tai-mt-0"><span class="m_1"></span></h1>
        </div>
    </div>
    <div class="container text-center">
        <h1 class="tai-mt-0">8th AINET INTERNATIONAL CONFERENCE</h1>
        <h2>17-19 JANUARY 2025</h2><br><br>
        <h2>“ELE at the Crossroads”</h2>
        <br>
        <p>Supported by</p>
        <b>British Council</b><br><br>
    </div>
    <div id="overviews" class="section lb w3-white">
        <div class="container">
            <div class="section-title row">
                <div class="col-md-6 offset-md-3">
                    @if (session('status') && session('status') === 'success')
                        <div class="card w5-border-orange">
                            <div class="card-header w3-orange w3-border-orange">{{ __('PRESENTATION PROPOSAL FORM') }}
                            </div>
                            <div class="card-body">
                                Thank you for submitting the proposal for presentation at the 8th AINET International
                                Conference on 17-19 JANUARY 2025. You will get official communication
                                from AINET very soon. For conference related updates,keep visiting <a
                                    href="http://conf.theainet.net" target="_blank">conf.theainet.net</a> and<a
                                    href="http://www.theainet.net/" target="_blank"> www.theainet.net.</a> Thank You!
                                <br />
                                <h6>
                                    {{--  <a href="https://theainet.net/heledrf">  --}}
                                    {{--  <font color="blue">Submit Delegate Registration Form</font> &nbsp;  --}}
                                    <a type="button" class="btn w3-orange" href="/">Already Submitted? Go To
                                        Home</a>
                            </div>
                        </div>
                    @else
                        <div class="card w3-border-orange">
                            <div class="card-header w3-orange w3-border-orange">{{ __('PRESENTATION PROPOSAL FORM') }}
                            </div>

                            <div class="card-body">
                                <form action="{{ route('form.ppf') }}" method="post">
                                    @csrf
                                    <div class="alert alert-info mb-3">
                                        <strong>Note:</strong>
                                        <ul>
                                            <li>All presenters must complete the PPF. Proposals sent directly via email will
                                                be rejected.</li>
                                            <li>Presenters can submit only one proposal for solo presentation and one as a
                                                joint presenter.</li>
                                        </ul>
                                    </div>
                                    <h6><b>SINGLE/ MAIN PRESENTER</b></h6>
                                    <div class="form-group">
                                        <b><label for="title">Title:</label></b>
                                        <select name="main_title" id="title" required>
                                            <option value="">SELECT</option>
                                            <option value="Mr" @if (old('main_title') === 'Mr') selected @endif>Mr.
                                            </option>
                                            <option value="Ms" @if (old('main_title') === 'Ms') selected @endif>Ms.
                                            </option>
                                            <option value="Dr" @if (old('main_title') === 'Dr') selected @endif>Dr.
                                            </option>
                                            <option value="Prof" @if (old('main_title') === 'Prof') selected @endif>Prof.
                                            </option>
                                        </select>
                                        @error('main_title')
                                            <span class="error invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Full Name:</label> <span>(This will be printed on your
                                            certificate)</span>
                                        <input type="text" class="form-control @error('main_name') is-invalid @enderror"
                                            name="main_name" id="pr1_name" value="{{ old('main_name') }}">
                                        @error('main_name')
                                            <span class="error invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="main_work">Place Of Work:</label>
                                        <textarea name="main_work" id="main_work" class="form-control @error('main_work') is-invalid @enderror">{{ old('main_work') }}</textarea>
                                        @error('main_work')
                                            <span class="error invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <h6><b>Contact Details</b></h6>
                                    <div class="form-group">
                                        <label for="presenter_main_country_code">Mobile:</label>
                                        <select name="presenter_main_country_code" id=""
                                            class="form-control @error('presenter_main_country_code') is-invalid @enderror">
                                            @error('presenter_main_country_code')
                                                <span class="error invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <option data-countryCode="" value="" selected>Country Code</option>

                                            @foreach ($countries as $country)
                                                <option data-countryCode="{{ $country->iso }}"
                                                    value="{{ $country->phonecode }}"
                                                    {{ old('presenter_main_country_code') == $country->phonecode ? 'selected' : '' }}>
                                                    {{ $country->name }} (+{{ $country->phonecode }})
                                                </option>
                                            @endforeach
                                        </select><br>
                                        <input type="text" class="form-control @error('main_phone') is-invalid @enderror"
                                            name="main_phone" id="main_phone" placeholder="Enter Your Mobile No."
                                            value="{{ old('main_phone') }}">
                                        @error('main_phone')
                                            <span class="error invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="presenter_main_email">Email:</label>
                                        <input type="email"
                                            class="form-control @error('presenter_main_email') is-invalid @enderror"
                                            name="presenter_main_email" id="presenter_main_email"
                                            value="{{ old('presenter_main_email') }}">
                                        @error('presenter_main_email')
                                            <span class="error invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label for="has_co_presenter">Do you have a Co-presenter?</label>
                                        <input type="checkbox" name="has_co_presenter" id="has_co_presenter" value="1"
                                            {{ old('has_co_presenter') ? 'checked' : '' }}>
                                    </div>
                                    {{-- <h6><b>CO-PRESENTERS</b> <h6>(Click to add more, if applicable)</h6> --}}
                                    <div id="co_presenter_section_1" style="display: none;">

                                        <h6><b>CO-PRESENTERS</b>
                                            <h6>(if applicable)</h6>
                                            {{-- <button type="button" class="btn btn-primary" id="add-btn"><i class="fa fa-user-plus"> </i> Add CO-PRESENTER</button><br><br> --}}
                                            {{-- start add co-presenter --}}
                                            {{-- <button type="button" class="btn btn-primary" id="add-btn"><i class="fa fa-user-plus"> </i> Add CO-PRESENTER</button><br><br> --}}
                                            <div class="container" id="add_co">
                                                <section id="mainsection">
                                                    {{-- <button id="newsectionbtn">+New Section</button> --}}

                                                    <div class="form-group">
                                                        <label for="pr2_name">Co-presenter 1 :</label>



                                                        <div class="form-group" id="add-co">
                                                            <b><label for="title">Title:</label></b>
                                                            <select name="co1_title" id="title">
                                                                <optgroup>
                                                                    <option value="">SELECT</option>

                                                                    <option
                                                                        @if (old('co1_title') === 'Mr') selected @endif
                                                                        value="Mr">Mr.</option>
                                                                    <option
                                                                        @if (old('co1_title') === 'Ms') selected @endif
                                                                        value="Ms">Ms.</option>
                                                                    <option
                                                                        @if (old('co1_title') === 'Dr') selected @endif
                                                                        value="Dr">Dr.</option>
                                                                    <option
                                                                        @if (old('co1_title') === 'Prof') selected @endif
                                                                        value="Prof">Prof.</option>
                                                                </optgroup>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <label>Name :</label>
                                                    <input type="name" class="form-control" name="co1_name"
                                                        id="co1_name" value="{{ old('co1_name') }}">
                                                    <div class="form-group">
                                                        <label for="co1_work">Place Of Work:</label>
                                                        <textarea name="co1_work" id="co1_work" class="form-control"> {{ old('pr2_work') }}</textarea>
                                                    </div>
                                                    <b>Contact Details</b><br><br>
                                                    <div class="form-group">
                                                        <label for="co1_country_code">Mobile:</label>
                                                        <select name="co1_country_code" id=""
                                                            class="form-control">
                                                            <option data-countryCode="" value="" Selected>Country
                                                                Code
                                                            </option>
                                                            @foreach ($countries as $country)
                                                                <option data-countryCode="{{ $country->iso }}"
                                                                    value="{{ $country->phonecode }}">
                                                                    {{ $country->name }} (+{{ $country->phonecode }})
                                                                </option>
                                                            @endforeach

                                                            </optgroup>
                                                        </select><br />
                                                        <input type="text" class="form-control" name="co1_phone"
                                                            id="co1_phone" placeholder="Enter Your Mobile Number"
                                                            value="{{ old('co1_phone') }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="co1_email">Email:</label>
                                                        <input type="email" class="form-control" name="co1_email"
                                                            id="co1_email" value="{{ old('co1_email') }}">
                                                    </div>
                                                </section>
                                            </div>
                                    </div>

                                    {{-- end add co-presenter --}}
                                    <div class="form-group" id="div_has_co1_presenter" style="display: none;">
                                        <label for="has_co1_presenter">Do you have a second Co-presenter?</label>
                                        <input type="checkbox" name="has_co1_presenter" id="has_co1_presenter"
                                            value="1" {{ old('has_co1_presenter') ? 'checked' : '' }}>
                                    </div>
                                    <div id="co_presenter_section_2" style="display: none;">

                                        <label for="pr3_name">Co-presenter 2 :</label>

                                        <div class="form-group">
                                            <div class="form-group">
                                                <b><label for="title">Title:</label></b>

                                                <select name="co2_title" id="title">
                                                    <option value="">SELECT</option>
                                                    <option value="Mr"
                                                        @if (old('co2_title') === 'Mr') selected @endif>Mr.</option>
                                                    <option value="Ms"
                                                        @if (old('co2_title') === 'Ms') selected @endif>Ms.</option>
                                                    <option value="Dr"
                                                        @if (old('co2_title') === 'Dr') selected @endif>Dr.</option>
                                                    <option value="Prof"
                                                        @if (old('co2_title') === 'Prof') selected @endif>Prof.</option>
                                                </select>
                                            </div>
                                            <label>Name :</label>
                                            <input type="name" class="form-control" name="co2_name" id="co2_name"
                                                placeholder="Enter Here" value="{{ old('co2_name') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="co2_work">Place Of Work:</label>
                                            <textarea name="co2_work" id="co2_work" class="form-control" placeholder="Enter Your Place Of Work">{{ old('co2_work') }}</textarea>
                                        </div>
                                        <h6><b>Contact Details</b></h6>
                                        <div class="form-group">
                                            <label for="co2_phone">Mobile:</label>
                                            <select name="co2_country_code" id=""
                                                class="form-control @error('co2_country_code') is-invalid @enderror">
                                                @error('co2_country_code')
                                                    <span class="error invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <option data-countryCode="" value="" Selected>Country Code</option>
                                                @foreach ($countries as $country)
                                                    <option data-countryCode="{{ $country->iso }}"
                                                        value="{{ $country->phonecode }}">{{ $country->name }}
                                                        (+{{ $country->phonecode }})
                                                    </option>
                                                @endforeach

                                                </optgroup>
                                            </select><br>
                                            <input type="text"
                                                class="form-control @error('co2_phone') is-invalid @enderror"
                                                name="co2_phone" id="co2_phone" placeholder="Enter Your Mobile No."
                                                value="{{ old('co2_phone') }}">
                                            @error('co2_phone')
                                                <span class="error invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="co2_email">Email:</label>
                                            <input type="email"
                                                class="form-control @error('co2_email') is-invalid @enderror"
                                                name="co2_email" id="co2_email" value="{{ old('co2_email') }}">
                                            @error('co2_email')
                                                <span class="error invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group" id="div_has_co2_presenter" style="display: none;">
                                        <label for="has_co2_presenter">Do you have a third Co-presenter?</label>
                                        <input type="checkbox" name="has_co2_presenter" id="has_co2_presenter"
                                            value="1" {{ old('has_co2_presenter') ? 'checked' : '' }}>
                                    </div>
                                    <div id="co_presenter_section_3" style="display: none;">

                                        {{--  start co-presenter 3  --}}
                                        <label for="pr3_name">Co-presenter 3 :</label>

                                        <div class="form-group">
                                            <div class="form-group">
                                                <b><label for="title">Title:</label></b>
                              

                                                <select name="co3_title" id="title" >
                                                    <option value="">SELECT</option>
                                                    <option value="Mr"
                                                        @if (old('co3_title') === 'Mr') selected @endif>Mr.</option>
                                                    <option value="Ms"
                                                        @if (old('co3_title') === 'Ms') selected @endif>Ms.</option>
                                                    <option value="Dr"
                                                        @if (old('co3_title') === 'Dr') selected @endif>Dr.</option>
                                                    <option value="Prof"
                                                        @if (old('co3_title') === 'Prof') selected @endif>Prof.</option>
                                                </select>
                                            </div>
                                            <label>Name :</label>
                                            <input type="name" class="form-control" name="co3_name" id="co3_name"
                                                placeholder="Enter Here" value="{{ old('co3_name') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="co3_work">Place Of Work:</label>
                                            <textarea name="co3_work" id="co3_work" class="form-control" placeholder="Enter Your Place Of Work">{{ old('co3_work') }}</textarea>
                                        </div>
                                        <b>Contact Details</b><br><br>
                                        <div class="form-group">
                                            <label for="co3_phone">Mobile:</label>
                                            <select name="co3_country_code" id="" class="form-control">
                                                <option data-countryCode="" value="" Selected>Country Code
                                                </option>
                                                @foreach ($countries as $country)
                                                    <option data-countryCode="{{ $country->iso }}"
                                                        value="{{ $country->phonecode }}">{{ $country->name }}
                                                        (+{{ $country->phonecode }})
                                                    </option>
                                                @endforeach

                                                </optgroup>
                                            </select><br>
                                            <input type="number" class="form-control" name="co3_phone" id="co3_phone"
                                                placeholder="Enter Your Mobile No." value="{{ old('co3_phone') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="co3_email">Email:</label>
                                            <input type="email" class="form-control" name="co3_email" id="co3_email"
                                                placeholder="Enter Your Email" value="{{ old('co3_email') }}">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label for="pr_area">
                                            <h6><b>Which conference sub-theme is your presentation related to?</b></h6>
                                        </label>

                                        <div class="form-check">
                                            <input type="radio" name="pr_area"
                                                value="New directions in ELE methodology, materials and assessment"
                                                class="form-check-input @error('pr_area') is-invalid @enderror"
                                                @if (old('pr_area') === 'New directions in ELE methodology, materials and assessment') checked @endif>
                                            <label class="form-check-label">New directions in ELE methodology, materials
                                                and assessment</label>
                                        </div>

                                        <div class="form-check">
                                            <input type="radio" name="pr_area" value="Multilingualism and ELE"
                                                class="form-check-input @error('pr_area') is-invalid @enderror"
                                                @if (old('pr_area') === 'Multilingualism and ELE') checked @endif>
                                            <label class="form-check-label">Multilingualism and ELE</label>
                                        </div>

                                        <div class="form-check">
                                            <input type="radio" name="pr_area"
                                                value="Changing roles of ELE teachers and teacher education"
                                                class="form-check-input @error('pr_area') is-invalid @enderror"
                                                @if (old('pr_area') === 'Changing roles of ELE teachers and teacher education') checked @endif>
                                            <label class="form-check-label">Changing roles of ELE teachers and teacher
                                                education</label>
                                        </div>

                                        <div class="form-check">
                                            <input type="radio" name="pr_area"
                                                value="New trends & initiatives in research in ELE"
                                                class="form-check-input @error('pr_area') is-invalid @enderror"
                                                @if (old('pr_area') === 'New trends & initiatives in research in ELE') checked @endif>
                                            <label class="form-check-label">New trends & initiatives in research in
                                                ELE</label>
                                        </div>

                                        <div class="form-check">
                                            <input type="radio" name="pr_area" value="AI and ELE"
                                                class="form-check-input @error('pr_area') is-invalid @enderror"
                                                @if (old('pr_area') === 'AI and ELE') checked @endif>
                                            <label class="form-check-label">AI and ELE</label>
                                        </div>

                                        <div class="form-check">
                                            <input type="radio" name="pr_area"
                                                value="Role of social media in English language development
"
                                                class="form-check-input @error('pr_area') is-invalid @enderror"
                                                @if (old('pr_area') === 'Role of social media in English language development') checked @endif>
                                            <label class="form-check-label">Role of social media in English language
                                                development</label>
                                        </div>

                                        <div class="form-check">
                                            <input type="radio" name="pr_area"
                                                value="Communities of Practice in ELE: Teacher networks and associations"
                                                class="form-check-input @error('pr_area') is-invalid @enderror"
                                                @if (old('pr_area') === 'Communities of Practice in ELE: Teacher networks and associations') checked @endif>
                                            <label class="form-check-label">Communities of Practice in ELE: Teacher
                                                networks and associations</label>
                                        </div>

                                        <div class="form-check">
                                            <input type="radio" name="pr_area"
                                                value="Decentring ELE: Global and local initiatives"
                                                class="form-check-input @error('pr_area') is-invalid @enderror"
                                                @if (old('pr_area') === 'Decentring ELE: Global and local initiatives') checked @endif>
                                            <label class="form-check-label">Decentring ELE: Global and local
                                                initiatives</label>
                                        </div>

                                        <div class="form-check">
                                            <input type="radio" name="pr_area"
                                                value="Literature and language development: Mutually supportive pedagogical practices"
                                                class="form-check-input @error('pr_area') is-invalid @enderror"
                                                @if (old('pr_area') === 'Literature and language development: Mutually supportive pedagogical practices') checked @endif>
                                            <label class="form-check-label">Literature and language development: Mutually
                                                supportive pedagogical practices</label>
                                        </div>

                                        <div class="form-check">
                                            <input type="radio" name="pr_area"
                                                value="Assessment practices within the changing ELE paradigms"
                                                class="form-check-input @error('pr_area') is-invalid @enderror"
                                                @if (old('pr_area') === 'Assessment practices within the changing ELE paradigms') checked @endif>
                                            <label class="form-check-label">Assessment practices within the changing ELE
                                                paradigms</label>
                                        </div>

                                        <div class="form-check">
                                            <input type="radio" name="pr_area"
                                                value="New approaches to materials development and teaching-learning resources in ELE"
                                                class="form-check-input @error('pr_area') is-invalid @enderror"
                                                @if (old('pr_area') === 'New approaches to materials development and teaching-learning resources in ELE') checked @endif>
                                            <label class="form-check-label">New approaches to materials development and
                                                teaching-learning resources in ELE</label>
                                        </div>

                                        <div class="form-check">
                                            <input type="radio" name="pr_area"
                                                value="History and historiography of ELE"
                                                class="form-check-input @error('pr_area') is-invalid @enderror"
                                                @if (old('pr_area') === 'History and historiography of ELE') checked @endif>
                                            <label class="form-check-label">History and historiography of ELE</label>
                                        </div>

                                        @error('pr_area')
                                            <span class="error invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        <div class="mt-2">
                                            <label for="pr_area_specify">Other:</label>
                                            <textarea name="pr_area_specify" id="pr_area_specify" class="form-control">{{ old('pr_area_specify') }}</textarea>
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="form-group">

                                        <div class="form-group">
                                            <h6><b>What is the nature of your presentation?</b></h6>

                                            <div class="form-check">
                                                <input type="radio" name="pr_nature" value="Paper"
                                                    class="form-check-input @error('pr_nature') is-invalid @enderror"
                                                    @if (old('pr_nature') === 'Paper') checked @endif>
                                                <label class="form-check-label">Paper (15 mins)</label>
                                            </div>



                                            <div class="form-check">
                                                <input type="radio" name="pr_nature" value="Poster"
                                                    class="form-check-input @error('pr_nature') is-invalid @enderror"
                                                    @if (old('pr_nature') === 'Poster') checked @endif>
                                                <label class="form-check-label">Poster</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" name="pr_nature" value="Fast-15"
                                                    class="form-check-input @error('pr_nature') is-invalid @enderror"
                                                    @if (old('pr_nature') === 'Fast-15') checked @endif>
                                                <label class="form-check-label">Fast-15</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" name="pr_nature" value="Video-Presentation"
                                                    class="form-check-input @error('pr_nature') is-invalid @enderror"
                                                    @if (old('pr_nature') === 'Video-Presentation') checked @endif>
                                                <label class="form-check-label">Video Presentation</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" name="pr_nature" value="creative"
                                                    class="form-check-input @error('pr_nature') is-invalid @enderror"
                                                    @if (old('pr_nature') === 'creative') checked @endif>
                                                <label class="form-check-label">Creative</label>
                                            </div>

                                            @error('pr_nature')
                                                <span class="error invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                    </div>
                                    <hr>

                                    <div class="form-group">
                                        <h6><b>PRESENTATION DETAILS</b></h6>
                                        <div class="form-group">
                                            <label for="pr_title">TITLE (Max. 10 words):</label>
                                            <textarea name="pr_title" id="pr_title" class="form-control @error('pr_title') is-invalid @enderror">{{ old('pr_title') }}</textarea>
                                            @error('pr_title')
                                                <span class="error invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="pr_abstract">ABSTRACT (Max. 150 words):</label>
                                            <textarea name="pr_abstract" id="pr_abstract" class="form-control @error('pr_abstract') is-invalid @enderror">{{ old('pr_abstract') }}</textarea>
                                            @error('pr_abstract')
                                                <span class="error invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <h6><b>PRESENTER BIO (Max. 30 words each) </b></h6>
                                        <div class="form-group">
                                            <label for="pr1_bio">Main / Single Presenter:</label>
                                            <textarea placeholder="PRESENTER BIO (Max. 30 words each)" name="presenter_bio" id="presenter_bio"
                                                class="form-control @error('presenter_bio') is-invalid @enderror">{{ old('presenter_bio') }}</textarea>
                                            @error('presenter_bio')
                                                <span class="error invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group" id="co_presenter1_bio" style="display: none;">
                                            <label for="co_presenter_1_bio">Co-Presenter 1: <span>( Write 'NA' if not
                                                    applicable)</span></label>
                                            <textarea placeholder="PRESENTER BIO (Max. 30 words each)" name="co_presenter_1_bio" id="co_presenter_1_bio"
                                                class="form-control @error('co_presenter_1_bio') is-invalid @enderror">{{ old('co_presenter_1_bio') }}</textarea>
                                            @error('co_presenter_1_bio')
                                                <span class="error invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group" id="co_presenter2_bio" style="display: none;">
                                            <label for="co_presenter_2_bio">Co-Presenter 2: <span>( Write 'NA' if not
                                                    applicable)</span></label>
                                            <textarea placeholder="PRESENTER BIO (Max. 30 words each)" name="co_presenter_2_bio" id="co_presenter_2_bio"
                                                class="form-control @error('co_presenter_2_bio') is-invalid @enderror">{{ old('co_presenter_2_bio') }}</textarea>
                                            @error('co_presenter_2_bio')
                                                <span class="error invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group" id="co_presenter3_bio" style="display: none;">
                                            <label for="pr3_bio">Remaining Copresenters (if any):</label>
                                            <textarea placeholder="PRESENTER BIO (Max. 30 words each)" name="pr3_bio" id="pr3_bio" class="form-control">{{ old('pr3_bio') }}</textarea>
                                        </div>
                                    </div>


                                    <b><span>Important notes :</span></b>
                                    <li> Thank you for your proposal, which will be reviewed by the scrutiny committee. A
                                        decision on your proposal will be conveyed
                                        to you by <b>30 Jan 2025. </b></li>
                                    <li>On acceptance of the proposal, <b>ALL</b> co-presenters must register as
                                        delegates. Names of the unregistered presenters will be removed from the
                                        conference programme.</li>
                                    <input type="hidden" name="g-recaptcha-response" id="recaptcha-token">

                                    <button type="submit" name="" id=""
                                        class="btn w3-orange btn-lg btn-block">Submit</button>
                                </form>
                            </div>
                        </div>
                    @endif
                </div><!-- end messagebox -->
            </div><!-- end col -->
        </div>
    </div><!-- end messagebox -->
    </div><!-- end col -->
    </div><!-- end row -->
    </div><!-- end container -->
    <!-- </div>end section -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://www.google.com/recaptcha/api.js?render=6LfbuZkqAAAAAFFKZ_IBHfkvNnOj8rSNulkIcjNq"></script>
    <script>
        grecaptcha.ready(function() {
            grecaptcha.execute('6LfbuZkqAAAAAFFKZ_IBHfkvNnOj8rSNulkIcjNq', {
                action: 'submit'
            }).then(function(token) {
                document.getElementById('recaptcha-token').value = token;
            });
        });
        $(document).ready(function() {

            $("button[name='addDom']").click(function() {
                var domElement = $(
                    '<div class="module_holder"><div class="module_item"><img src="images/i-5.png" alt="Sweep Stakes" /></div></div>'
                );
                $(this).after(domElement);
            });

            if ($('#has_co_presenter').is(':checked')) {
                $('#co_presenter_section_1').show();
                $('#co_presenter1_bio').show();
                $('#div_has_co1_presenter').show();
            } else {
                $('#co_presenter1_bio').hide();

                $('#co_presenter_section_1').hide();
            }

            $('#has_co_presenter').change(function() {
                if (this.checked) {
                    $('#co_presenter_section_1').show();
                    $('#co_presenter1_bio').show();
                    $('#div_has_co1_presenter').show();

                } else {
                    $('#co_presenter1_bio').hide();

                    $('#co_presenter_section_1').hide();
                    $('#div_has_co1_presenter').hide();

                }
            });
            if ($('#has_co1_presenter').is(':checked')) {
                $('#co_presenter_section_2').show();
                $('#co_presenter2_bio').show();
                $('#div_has_co2_presenter').show();

            } else {
                $('#co_presenter2_bio').hide();

                $('#co_presenter_section_2').hide();

            }

            if ($('#has_co2_presenter').is(':checked')) {
                $('#co_presenter_section_3').show();
                $('#co_presenter3_bio').show();

            } else {
                $('#co_presenter3_bio').hide();

                $('#co_presenter_section_3').hide();
            }

            $('#has_co1_presenter').change(function() {
                if (this.checked) {
                    $('#co_presenter_section_2').show();
                    $('#co_presenter2_bio').show();
                    $('#div_has_co2_presenter').show();

                } else {
                    $('#co_presenter2_bio').hide();

                    $('#co_presenter_section_2').hide();
                    $('#div_has_co2_presenter').hide();

                }
            });

            $('#has_co2_presenter').change(function() {
                if (this.checked) {
                    $('#co_presenter_section_3').show();
                    $('#co_presenter3_bio').show();
                } else {
                    $('#co_presenter3_bio').hide();

                    $('#co_presenter_section_3').hide();
                }
            });
        });
    </script>

@endsection
