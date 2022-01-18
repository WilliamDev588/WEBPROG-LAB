@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    View profile
                </div>

                <div class="card-body">
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label>
                        <div class="col-md-6">
                            {{ Auth::user()->fullname }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                        <div class="col-md-6">
                            {{ Auth::user()->email }}
                        </div>
                    </div>
                    @if(Auth::user()->role =='Admin')
                    <div class="row mb-3">
                        <label for="Role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>

                        <div class="col-md-6">
                            {{ Auth::user()->role }}
                        </div>
                    </div>
                    @else
                    <div class="row mb-3">
                        <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                        <div class="col-md-6">
                            {{ Auth::user()->address }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                        <div class="col-md-6">
                            {{ Auth::user()->gender }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="Role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>

                        <div class="col-md-6">
                            {{ Auth::user()->role }}
                        </div>
                    </div>
                    @endif
                    <div class="form-group row mb-0">
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary">
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                    style="text-decoration: none; color:white">
                                    {{ __('Logout') }}
                                </a>
                            </button>
                        </div>
                        @if(Auth::user()->role =='Admin')
                        <div class="col-md-6">
                            <a href="/transactionHistory" class="btn btn-primary">View All User's Transaction History</a>
                            </div>

                        @else
                        <div class="col-md-6">
                            <a href="/transactionHistory" class="btn btn-primary">View Transaction History</a>
                            </div>
                        @endif
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary">
                                <a href="{{url('update_profile')}}" style="text-decoration: none; color:white">
                                    Update Profile
                                </a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection