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
                        <li class="breadcrumb-item active">Social Auth</li>
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
                            <h3 class="card-title">Social Auth <small></small></h3>
                        </div>
                        <form role="form" id="quickForm" method="POST" action="{{ route('admin.setting.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">GOOGLE_CLIENT_ID</label>
                                            <input id="GOOGLE_CLIENT_ID" type="text"
                                                class="form-control @error('GOOGLE_CLIENT_ID') is-invalid @enderror" name="GOOGLE_CLIENT_ID"
                                                value="{{ old('GOOGLE_CLIENT_ID',$data['GOOGLE_CLIENT_ID']) }}" autocomplete="GOOGLE_CLIENT_ID" autofocus>
                                            @error('GOOGLE_CLIENT_ID')
                                                <span class="error invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="GOOGLE_CLIENT_SECRET">GOOGLE_CLIENT_SECRET</label>
                                            <input id="GOOGLE_CLIENT_SECRET" type="text"
                                                class="form-control @error('GOOGLE_CLIENT_SECRET') is-invalid @enderror" name="GOOGLE_CLIENT_SECRET"
                                                value="{{ old('GOOGLE_CLIENT_SECRET',$data['GOOGLE_CLIENT_SECRET']) }}" autocomplete="GOOGLE_CLIENT_SECRET" autofocus>
                                            @error('GOOGLE_CLIENT_SECRET')
                                                <span class="error invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">FACEBOOK_CLIENT_ID</label>
                                            <input id="FACEBOOK_CLIENT_ID" type="text"
                                                class="form-control @error('FACEBOOK_CLIENT_ID') is-invalid @enderror" name="FACEBOOK_CLIENT_ID"
                                                value="{{ old('FACEBOOK_CLIENT_ID',$data['FACEBOOK_CLIENT_ID']) }}" autocomplete="FACEBOOK_CLIENT_ID" autofocus>
                                            @error('FACEBOOK_CLIENT_ID')
                                                <span class="error invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                       <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">FACEBOOK_CLIENT_SECRET</label>
                                            <input id="FACEBOOK_CLIENT_SECRET" type="text"
                                                class="form-control @error('FACEBOOK_CLIENT_SECRET') is-invalid @enderror" name="FACEBOOK_CLIENT_SECRET"
                                                value="{{ old('FACEBOOK_CLIENT_SECRET',$data['FACEBOOK_CLIENT_SECRET']) }}" autocomplete="FACEBOOK_CLIENT_SECRET" autofocus>
                                            @error('FACEBOOK_CLIENT_SECRET')
                                                <span class="error invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">APPLE_CLIENT_ID</label>
                                            <input id="APPLE_CLIENT_ID" type="text"
                                                class="form-control @error('APPLE_CLIENT_ID') is-invalid @enderror" name="APPLE_CLIENT_ID"
                                                value="{{ old('APPLE_CLIENT_ID',$data['APPLE_CLIENT_ID']) }}" autocomplete="APPLE_CLIENT_ID" autofocus>
                                            @error('APPLE_CLIENT_ID')
                                                <span class="error invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">APPLE_CLIENT_SECRET</label>
                                            <input id="APPLE_CLIENT_SECRET" type="text"
                                                class="form-control @error('APPLE_CLIENT_SECRET') is-invalid @enderror" name="APPLE_CLIENT_SECRET"
                                                value="{{ old('APPLE_CLIENT_SECRET',$data['APPLE_CLIENT_SECRET']) }}" autocomplete="APPLE_CLIENT_SECRET" autofocus>
                                            @error('APPLE_CLIENT_SECRET')
                                                <span class="error invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                 
                                  
                                   
                                </div>
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

