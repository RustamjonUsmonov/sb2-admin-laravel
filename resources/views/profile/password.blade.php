@extends('layouts.sb2')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-12 mb-md-2 mb-4">
                <h6 class="m-0 font-weight-bold text-primary">{{ __('Profile information') }}</h6>
                Update your account's password.
            </div>
            <div class="col">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">{{Auth::user()->getRoleNames()->first()}}</h6>
                    </div>
                    <div class="card-body col-12">
                        <div class="form-row">
                            <form method="POST"
                                  action="{{route('passwords.update',\Illuminate\Support\Facades\Auth::id())}}"
                                  class="col">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="new">New Password:</label>
                                            <input id="new" type="password"
                                                   class="form-control @error('password') is-invalid @enderror"
                                                   name="password" autofocus>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="confirm">Confirm Password:</label>
                                            <input id="confirm" type="password"
                                                   class="form-control @error('password_confirmation') is-invalid @enderror"
                                                   name="password_confirmation" required>
                                            @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>

@endsection
